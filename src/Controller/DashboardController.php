<?php
declare(strict_types=1);

namespace App\Controller;

class DashboardController extends AppController
{
    public function index()
    {


        $categoriesTable = $this->fetchTable('Categories');
// 🔥 kira total categories
$totalCategories = $categoriesTable->find()->count();

        $productsTable = $this->fetchTable('Products');
        $ordersTable = $this->fetchTable('Orders');

        $totalProducts = $productsTable->find()->count();
        $totalOrders = $ordersTable->find()->count();

$this->set(compact('totalProducts', 'totalOrders', 'totalCategories'));
    }
}