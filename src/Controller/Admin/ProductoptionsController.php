<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

class ProductoptionsController extends AppController
{

////////////////////////////////////////////////////////////////////////////////

    public function t()
    {
        $productoptions = $this->Productoptions->find('all', [
            'limit' => 50000
        ]);

        foreach($productoptions as $productoption) {
            echo $productoption->name;

            preg_match('/[0-9]{0,5},[0-9]{1,5} Lbs|[0-9]{1,6} Lbs/', $productoption->name, $matches);
            if(!empty($matches[0])) {
                // print_r($matches[0]);
                echo ' == ' . $matches[0];
                $productoption->weight = $matches[0];
                $this->Productoptions->save($productoption);
            }

            echo "<br />\n";
        }


        die('end');
    }

////////////////////////////////////////////////////////////////////////////////

    public function index()
    {
        $this->paginate = [
            'contain' => ['Products']
        ];
        $productoptions = $this->paginate($this->Productoptions);

        $this->set(compact('productoptions'));
        $this->set('_serialize', ['productoptions']);
    }

////////////////////////////////////////////////////////////////////////////////

    public function view($id = null)
    {
        $productoption = $this->Productoptions->get($id, [
            'contain' => ['Products']
        ]);

        $this->set('productoption', $productoption);
        $this->set('_serialize', ['productoption']);
    }

////////////////////////////////////////////////////////////////////////////////

    public function add()
    {
        $productoption = $this->Productoptions->newEntity();
        if ($this->request->is('post')) {
            $productoption = $this->Productoptions->patchEntity($productoption, $this->request->data);

            if ($this->Productoptions->save($productoption)) {
                $this->Flash->success('Optiunea de produs a fost salvata');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Optiunea de produs nu a putut fi salvata. Va rugam incercati din nou');
            }
        }
        $products = $this->Productoptions->Products->find('list', ['limit' => 200]);
        $this->set(compact('productoption', 'products'));
        $this->set('_serialize', ['productoption']);
    }

////////////////////////////////////////////////////////////////////////////////

    public function edit($id = null)
    {
        $productoption = $this->Productoptions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productoption = $this->Productoptions->patchEntity($productoption, $this->request->data);

            if ($this->Productoptions->save($productoption)) {
                $this->Flash->success('Optiunea de produs a fost salvata.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Optiunea de produs nu a putut fi salvata. Va rugam incercati din nou.');
            }
        }
        $products = $this->Productoptions->Products->find('list', ['limit' => 200]);
        $this->set(compact('productoption', 'products'));
        $this->set('_serialize', ['productoption']);
    }

////////////////////////////////////////////////////////////////////////////////

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productoption = $this->Productoptions->get($id);
        if ($this->Productoptions->delete($productoption)) {
            $this->Flash->success('Optiunea de produs a fost stearsa.');
        } else {
            $this->Flash->error('Optiunea de produs nu a putut fi stearsa. Va rugam incercati din nou.');
        }
        return $this->redirect(['action' => 'index']);
    }

////////////////////////////////////////////////////////////////////////////////

}
