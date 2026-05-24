<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;

class AppController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');
    }

    // 🔐 PROTECT SYSTEM (LOGIN REQUIRED)
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        // ✅ Allow public access (tak perlu login)
        $allowedActions = ['login', 'register', 'display'];

        // Ambil current controller & action
        $controller = $this->request->getParam('controller');
        $action = $this->request->getParam('action');

        // ❌ Kalau bukan page yang dibenarkan → check login
        if (!in_array($action, $allowedActions)) {

            $user = $this->request->getSession()->read('Auth');

            if (!$user) {
                return $this->redirect([
                    'controller' => 'Users',
                    'action' => 'login'
                ]);
            }
        }
    }
}