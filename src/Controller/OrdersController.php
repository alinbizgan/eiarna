<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;

class OrdersController extends AppController
{

////////////////////////////////////////////////////////////////////////////////
    private $shipping_array;
    // Pretul de baza transportului
    private $SHIPPING_COEF = 2;
    
    public function initialize()
    {
        parent::initialize();
        $this->shipping_array = array("B" => 0, "GR" => 1, "CL" => 1, "IL" => 1, "PH" => 1, "DB" => 1, "TR" => 2, "AG" => 2, "BV" => 2, "CV" => 2, "GR" => 2, "BZ" => 2, "BR" => 2, "CT" => 2, "TL" => 3, "GL" => 3, "VN" => 3, "BC" => 3, "HR" => 3, "GR" => 3, "MS" => 3, "SB" => 3, "VL" => 3, "OT" => 3, "DJ" => 4, "GJ" => 4, "HD" => 4, "AB" => 4, "CJ" => 4, "BN" => 4, "SV" => 4, "NT" => 4, "VS" => 4, "IS" => 5, "BT" => 5, "MM" => 5, "SJ" => 5, "BH" => 5, "AR" => 5, "TM" => 5, "CS" => 5, "MH" => 5, "SM" => 6);
        $this->loadComponent('Cart');
        $this->loadModel('Products');
    }

////////////////////////////////////////////////////////////////////////////////

    public function address()
    {
        $shop = $this->Cart->getcart();
        //print_r($shop);
        if(!$shop['Order']['total']) {
            return $this->redirect('/');
        }

        $order = $this->Orders->newEntity();
        $shop['Order']['status'] = 'CREATA';


        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->data);
            
            if (!$order->errors()) {

                $order = $this->request->data;
                $order['tax'] = sprintf('%01.2f', $shop['Order']['subtotal'] * 0.021);
                
                $order['total'] = $shop['Order']['subtotal'];

                if($order['shipping_method'] == 'quote') {
                    
                    $shippingCounty = $order['shipping_county'];
                    $order['shipping'] = sprintf('%01.2f', $this->shipping_array[$shippingCounty] * $this->SHIPPING_COEF);
                    $order['total'] = sprintf('%01.2f', $shop['Order']['subtotal'] + $order['tax'] + $order['shipping']);
                } else {
                    $order['total'] = $shop['Order']['subtotal'] + $order['tax'];
                }

                $this->request->session()->write('Shop.Order', $order + $shop['Order']);
                return $this->redirect(['action' => 'review']);
            } else {
                $this->Flash->error('Nu ati completat corect toate datele, va rugam revizuiti');
            }
        } else {
            if(!empty($shop['Order'])) {
                $this->request->data = $shop['Order'];
            }
        }
        $this->set(compact('order'));
    }

////////////////////////////////////////////////////////////////////////////////

    public function review()
    {
        $shop = $this->Cart->getcart();
        if(!$shop['Order']['total']) {
            return $this->redirect('/');
        }
        $this->set(compact('shop'));

        $order = $this->Orders->newEntity($shop['Order']);

        if ($this->request->is('post')) {

            $order = $this->Orders->patchEntity($order, $this->request->data, ['validate' => 'review']);

            $order->ip_address = $this->request->clientIp();
            $order->remote_host = gethostbyaddr(env('REMOTE_ADDR'));
            $order->referer_cookie = $this->Cookie->read('referer_cookie');
            $order->referer_session = $this->request->session()->read('referer_session');
            $order->request_uri = $this->Cookie->read('request_uri');

            if($order->payment_method == 'paypal') {
                return $this->redirect('https://sandbox.paypal.com/cgi-bin/webscr?cmd=_view-a-trans&id=XXXXXX');
            }

            //check stocks!
            foreach ($shop['Orderproducts'] as $orderproduct) {
                $product = $this->Products->get($orderproduct['product_id']);

                if($product->quantity < $orderproduct['quantity']) {
                    $this->Flash->error('Comanda nu a putut fi plasata, produsul '.$orderproduct['name'].' nu mai este in stoc..');
                    return;
                }
            }



            $order->status = 'PLASATA';
            $ordersave = $this->Orders->save($order);

            if ($ordersave) {

                $orderproducts = $this->Orders->Orderproducts->newEntities($shop['Orderproducts']);

                foreach ($orderproducts as $orderproduct) {
                    $orderproduct['order_id'] = $ordersave->id;
                    $this->Orders->Orderproducts->save($orderproduct);

                    //substract the stock for the current product!
                    $product = $this->Products->get($orderproduct['product_id']);
                    $stockquantity = $product->quantity;
                    $newquantity = $stockquantity - $orderproduct['quantity'];
                    if($newquantity < 0 ) {
                        $this->Flash->error('Comanda nu a putut fi plasata, produsul '.$orderproduct->name.' nu mai este in stoc..');
                        return;
                    }
                    $product->quantity = $newquantity;
                    $this->Products->save($product);


                }

                $email = new Email();

                $email->from(['info@domain.com' => 'domain'])
                    ->transport('default')
                    ->sender('info@domain.com', 'domain')
                    ->domain('www.domain.com')
                    ->emailFormat('html')
                    ->to('info@domain.com')
                    ->subject('Website Order')
                    ->template('order', 'default')
                    ->viewVars(['shop' => $shop, 'order' => $order])
                    ->send();

                $email->from(['web@domain.com' => 'domain'])
                    ->transport('default')
                    ->sender('web@domain.com', 'domain')
                    ->domain('www.domain.com')
                    ->emailFormat('html')
                    ->to($order->email)
                    ->subject('Website Order')
                    ->template('order', 'default')
                    ->viewVars(['shop' => $shop, 'order' => $order])
                    ->send();

                return $this->redirect(['action' => 'success']);
            } else {
                $this->Flash->error('Comanda nu a putut fi plasata, va rugam incercati din nou');
            }
        }
        $this->set(compact('order'));
    }

////////////////////////////////////////////////////////////////////////////////

    public function success()
    {
        $shop = $this->Cart->getcart();
        $this->Cart->clear();
        if(empty($shop)) {
            return $this->redirect('/');
        }
        $this->set(compact('shop'));
    }

////////////////////////////////////////////////////////////////////////////////

}
