<?php
declare(strict_types=1);

namespace App\Controller;

class OrdersController extends AppController
{
    // 📦 LIST ORDERS (PER USER + PAGINATION)
    public function index()
    {
        $session = $this->request->getSession();
        $user = $session->read('Auth');

        $query = $this->Orders->find()
            ->where(['user_id' => $user->id])
            ->contain(['OrderItems' => ['Products']])
            ->order(['Orders.created' => 'DESC']);

        $orders = $this->paginate($query);

        $this->set(compact('orders'));
    }

    // 🔍 VIEW ORDER DETAIL
    public function view($id = null)
    {
        $session = $this->request->getSession();
        $user = $session->read('Auth');

        $order = $this->Orders->get($id, contain: [
    'OrderItems' => ['Products'],
    'Users'
]);

        // 🔐 SECURITY CHECK
        if ($order->user_id != $user->id) {
            $this->Flash->error('Anda tidak dibenarkan melihat order ini');
            return $this->redirect(['action' => 'index']);
        }

        $this->set(compact('order'));
    }

    // ❌ DELETE ORDER
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $session = $this->request->getSession();
        $user = $session->read('Auth');

        $order = $this->Orders->get($id);

        // 🔐 SECURITY CHECK
        if ($order->user_id != $user->id) {
            $this->Flash->error('Unauthorized');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->Orders->delete($order)) {
            $this->Flash->success('Order berjaya dipadam');
        } else {
            $this->Flash->error('Gagal padam order');
        }

        return $this->redirect(['action' => 'index']);
    }
}