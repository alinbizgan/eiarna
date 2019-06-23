<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
// use Cake\Auth\DefaultPasswordHasher;


class UsersController extends AppController {

////////////////////////////////////////////////////////////////////////////////

    public function login()
    {

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();

            if ($user) {

                $u = $this->Users->newEntity();
                $u->id = $user['id'];
                $u->login_count = $user['login_count'] + 1;
                $u->login_last = date('Y-m-d H:i:s');
                $this->Users->save($u);

                $this->Auth->setUser($user);

                if ($user['role'] == 'user') {
                    return $this->redirect([
                        'controller' => 'users',
                        'action' => 'index',
                        'prefix' => 'user',
                    ]);
                }

                if ($user['role'] == 'admin') {
                    return $this->redirect([
                        'controller' => 'users',
                        'action' => 'index',
                        'prefix' => 'admin',
                    ]);
                }

            } else {
                $this->Flash->error('User sau parola incorecte', 'default', [], 'auth');
            }
        }
        $title_for_layout = 'Login';
        $description = 'Login';
        $keywords = '';
        $this->set(compact('title_for_layout', 'description', 'keywords'));
    }

////////////////////////////////////////////////////////////////////////////////

    public function logout()
    {
        $this->Flash->success('La revedere');
        return $this->redirect($this->Auth->logout());
    }

////////////////////////////////////////////////////////////////////////////////

}
