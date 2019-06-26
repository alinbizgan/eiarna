<?php
namespace App\Controller;

use App\Controller\AppController;

class ProductratingController extends AppController
{


    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Products');
    }

    public function add()
    {
        $productrating = $this->Productrating->newEntity();
        if ($this->request->is('post')) {
            $productrating = $this->Productrating->patchEntity($productrating, $this->request->data);

            if($productrating->rating <= 0 || $productrating->rating > 5) {
                $this->Flash->error('Nota recenziei trebuie sa fie intre 1 si 5');
            } else {
                if ($this->Productrating->save($productrating)) {

                    $product = $this->Products->get($productrating->product_id);
                    $product->average_rating_count = $product->average_rating_count + 1;
                    $product->average_rating = ($product->average_rating + $productrating->rating) / $product->average_rating_count;
                    $this->Products->save($product);

                    $this->Flash->success('Recenzia dumneavoastra a fost adaugata cu succes!');
                } else {
                    $this->Flash->error('Recenzia de produs nu a putut fi salvata. Va rugam incercati din nou');
                }

            }

        }
        return $this->redirect($this->referer());
    }

}
