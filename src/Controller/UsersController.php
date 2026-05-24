<?php
declare(strict_types=1);

namespace App\Controller;

class UsersController extends AppController
{
    // 🔐 LOGIN
    public function login()
    {
        $session = $this->request->getSession();

        if ($session->read('Auth')) {
            return $this->redirect([
                'controller' => 'Dashboard',
                'action' => 'index'
            ]);
        }

        if ($this->request->is('post')) {

            $username = $this->request->getData('username');
            $password = $this->request->getData('password');

            $user = $this->Users->find()
                ->where(['username' => $username])
                ->first();

            if (!$user) {
                $this->Flash->error('User tidak wujud');
                return;
            }

            if (password_verify($password, $user->password)) {

                $session->write('Auth', $user);

                $this->Flash->success('Login berjaya');

                return $this->redirect([
                    'controller' => 'Dashboard',
                    'action' => 'index'
                ]);
            }

            $this->Flash->error('Password salah');
        }
    }

    // 📝 REGISTER
    public function register()
    {
        $user = $this->Users->newEmptyEntity();

        if ($this->request->is('post')) {

            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                $this->Flash->success('Register berjaya, sila login');

                return $this->redirect(['action' => 'login']);
            }

            $this->Flash->error('Register gagal');
        }

        $this->set(compact('user'));
    }

    // 👤 PROFILE
    public function profile()
    {
        $session = $this->request->getSession();
        $user = $session->read('Auth');

        $userData = $this->Users->get($user->id);

        $this->set(compact('userData'));
    }

    // ✏️ EDIT PROFILE
    public function editProfile()
    {
        $session = $this->request->getSession();
        $user = $session->read('Auth');

        $userData = $this->Users->get($user->id);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $data = $this->request->getData();

            // 🔥 HANDLE PASSWORD (OPTIONAL)
            if (empty($data['password'])) {
                unset($data['password']);
            }

            $userData = $this->Users->patchEntity($userData, $data);

            if ($this->Users->save($userData)) {

                $session->write('Auth', $userData);

                $this->Flash->success('Profile berjaya dikemaskini');

                return $this->redirect(['action' => 'profile']);
            }

            $this->Flash->error('Gagal update profile');
        }

        $this->set(compact('userData'));
    }

    // 🚪 LOGOUT
    public function logout()
    {
        $session = $this->request->getSession();

        $session->destroy();

        $this->Flash->success('Logout berjaya');

        return $this->redirect([
            'controller' => 'Pages',
            'action' => 'display',
            'home'
        ]);
    }
}