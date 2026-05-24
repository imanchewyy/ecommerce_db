<?php
declare(strict_types=1);

namespace App\Controller;

class ProductsController extends AppController
{
    // 📦 LIST PRODUCTS
  public function index()
{
    $categoryId = $this->request->getQuery('category');

    $query = $this->Products->find()
        ->contain(['Categories']);

    if ($categoryId) {
        $query->where(['category_id' => $categoryId]);
    }

    $products = $query->all();

    $categories = $this->Products->Categories->find('list')->all();

    $this->set(compact('products', 'categories', 'categoryId'));
}

    // 🔍 VIEW PRODUCT
    public function view($id = null)
    {
        $product = $this->Products->get($id, contain: ['OrderItems']);

        $this->set(compact('product'));
    }

    // ➕ ADD PRODUCT
    public function add()
    {
        $product = $this->Products->newEmptyEntity();

        if ($this->request->is('post')) {

            $product = $this->Products->patchEntity($product, $this->request->getData());

            if ($this->Products->save($product)) {
                $this->Flash->success('Product berjaya ditambah');

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error('Gagal tambah product. Sila cuba lagi');
        }

        $this->set(compact('product'));
    }

    // ✏️ EDIT PRODUCT
    public function edit($id = null)
    {
        $product = $this->Products->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $product = $this->Products->patchEntity($product, $this->request->getData());

            if ($this->Products->save($product)) {
                $this->Flash->success('Product berjaya dikemaskini');

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error('Gagal update product');
        }

        $this->set(compact('product'));
    }

    // ❌ DELETE PRODUCT
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $product = $this->Products->get($id);

        if ($this->Products->delete($product)) {
            $this->Flash->success('Product berjaya dipadam');
        } else {
            $this->Flash->error('Product gagal dipadam');
        }

        return $this->redirect(['action' => 'index']);
    }
}