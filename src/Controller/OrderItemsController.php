<?php
declare(strict_types=1);

namespace App\Controller;

class OrderItemsController extends AppController
{
    // 🛒 VIEW CART (PER USER)
    public function index()
    {
        $session = $this->request->getSession();
        $user = $session->read('Auth');

        if (!$user) {
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        $cartKey = 'Cart_' . $user->id;
        $cart = $session->read($cartKey) ?? [];

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $this->set(compact('cart', 'total'));
    }

    // ➕ ADD TO CART
    public function add($productId = null)
    {
        $productsTable = $this->fetchTable('Products');
        $product = $productsTable->get($productId);

        $session = $this->request->getSession();
        $user = $session->read('Auth');

        if (!$user) {
            $this->Flash->error('Sila login dahulu');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        $cartKey = 'Cart_' . $user->id;
        $cart = $session->read($cartKey) ?? [];

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1
            ];
        }

        $session->write($cartKey, $cart);

        $this->Flash->success('Product ditambah ke cart');

        return $this->redirect(['controller' => 'Products', 'action' => 'index']);
    }

    // ❌ REMOVE ITEM
    public function remove($productId = null)
    {
        $session = $this->request->getSession();
        $user = $session->read('Auth');

        if (!$user) {
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        $cartKey = 'Cart_' . $user->id;
        $cart = $session->read($cartKey) ?? [];

        unset($cart[$productId]);

        $session->write($cartKey, $cart);

        return $this->redirect(['action' => 'index']);
    }

    // 💳 CHECKOUT
    public function checkout()
    {
        $session = $this->request->getSession();
        $user = $session->read('Auth');

        if (!$user) {
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        $cartKey = 'Cart_' . $user->id;
        $cart = $session->read($cartKey);

        if (!$cart) {
            $this->Flash->error('Cart kosong');
            return $this->redirect(['action' => 'index']);
        }

        $ordersTable = $this->fetchTable('Orders');
        $orderItemsTable = $this->fetchTable('OrderItems');

        // 🔥 kira total
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // 🔥 CREATE ORDER
        $order = $ordersTable->newEmptyEntity();
        $order->user_id = $user->id;
        $order->total = $total;

        // 🔥 IMPORTANT: SET STATUS
        $order->status = 'Completed'; // 👉 terus jadi HIJAU

        $ordersTable->save($order);

        // 🔥 SAVE ITEMS
        foreach ($cart as $productId => $item) {
            $orderItem = $orderItemsTable->newEmptyEntity();

            $orderItem->order_id = $order->id;
            $orderItem->product_id = $productId;
            $orderItem->quantity = $item['quantity'];
            $orderItem->price = $item['price'];

            $orderItemsTable->save($orderItem);
        }

        // 🧹 CLEAR CART
        $session->delete($cartKey);

        $this->Flash->success('Checkout berjaya');

        return $this->redirect(['controller' => 'Orders', 'action' => 'index']);
    }
}