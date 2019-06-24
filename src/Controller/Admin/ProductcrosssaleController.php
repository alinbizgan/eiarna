<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

class ProductcrosssaleController extends AppController
{


    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Products');
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['CrossProduct','BaseProduct']
        ];
        $productcrosssales = $this->paginate($this->Productcrosssale);

        $this->set(compact('productcrosssales'));
        $this->set('_serialize', ['productcrosssales']);
    }


////////////////////////////////////////////////////////////////////////////////

    public function add()
    {
        $productcrosssale = $this->Productcrosssale->newEntity();
        if ($this->request->is('post')) {
            $productcrosssale = $this->Productcrosssale->patchEntity($productcrosssale, $this->request->data);

            if($productcrosssale->base_product_id == $productcrosssale->cross_sale_product_id) {
                $this->Flash->error('Asocierea de produs nu a putut fi salvata. Produsele coincid');

            } else {

                if ($this->Productcrosssale->save($productcrosssale)) {
                    $this->Flash->success('Asocierea de produs a fost salvata');
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error('Asocierea de produs nu a putut fi salvata. Va rugam incercati din nou');
                }
            }
        }
        $products = $this->Products->find('list', ['limit' => 200]);
        $this->set(compact('productcrosssale', 'products'));
        $this->set('_serialize', ['productcrosssale']);
    }

    ////////////////////////////////////////////////////////////////////////////////

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productcrosssale = $this->Productcrosssale->get($id);
        if ($this->Productcrosssale->delete($productcrosssale)) {
            $this->Flash->success('Optiunea de produs a fost stearsa.');
        } else {
            $this->Flash->error('Optiunea de produs nu a putut fi stearsa. Va rugam incercati din nou.');
        }
        return $this->redirect(['action' => 'index']);
    }

////////////////////////////////////////////////////////////////////////////////

}
