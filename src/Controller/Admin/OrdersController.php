<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

class OrdersController extends AppController
{


    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Products');
        $this->loadModel('Orderproducts');
    }

////////////////////////////////////////////////////////////////////////////////

    public function index()
    {
        $this->paginate = [
            'limit' => 100
        ];
        $orders = $this->paginate($this->Orders);

        $this->set(compact('orders'));
        $this->set('_serialize', ['orders']);
    }

////////////////////////////////////////////////////////////////////////////////

    public function view($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['Orderproducts']
        ]);

        $this->set(compact('order'));
        $this->set('_serialize', ['order']);
    }

////////////////////////////////////////////////////////////////////////////////

    public function add()
    {
        $order = $this->Orders->newEntity();
        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->data);
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('Comanda a fost salvata.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Comanda nu a putut fi salvata. Va rugam incercati din nou.'));
            }
        }
        $this->set(compact('order'));
        $this->set('_serialize', ['order']);
    }

////////////////////////////////////////////////////////////////////////////////

    public function edit($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->data);
            $order->status = 'EDITATA';
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('Comanda a fost salvata.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Comanda nu a putut fi salvata. Va rugam incercati din nou.'));
            }
        }
        $this->set(compact('order'));
        $this->set('_serialize', ['order']);
    }

////////////////////////////////////////////////////////////////////////////////

    public function cancel($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        $order->status = 'ANULATA';

        //add back the stocks
        $orderproducts = $this->Orderproducts->find('all',['conditions' => ['order_id' => $id]]);
        foreach ($orderproducts as $orderproduct) { 
            $product = $this->Products->get($orderproduct['product_id']);
            $stockquantity = $product->quantity; 
            $newquantity = $stockquantity + $orderproduct['quantity']; 
            $product->quantity = $newquantity;
            if(!$this->Products->save($product)) {
                $this->Flash->error(__('Comanda nu a putut fi anulata. A avut loc o eroare la actualizarea stocurilor.'));
            }
        }

        if ($this->Orders->save($order)) {




            $this->Flash->success(__('Comanda a fost anulata.'));
        } else {
            $this->Flash->error(__('Comanda nu a putut fi anulata. Va rugam incercati din nou.'));
        }
        return $this->redirect(['action' => 'index']);
    }

////////////////////////////////////////////////////////////////////////////////

    public function delivered($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        $order->status = 'LIVRATA';
        if ($this->Orders->save($order)) {
            $this->Flash->success(__('Comanda a fost marcata ca livrata.'));
        } else {
            $this->Flash->error(__('Comanda nu a putut fi marcata ca livrata. Va rugam incercati din nou.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
