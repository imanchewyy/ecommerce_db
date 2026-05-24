<?php

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {

    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder): void {

        // HOMEPAGE
        $builder->connect('/', [
            'controller' => 'Pages',
            'action' => 'display',
            'home'
        ]);

        // AUTH
        $builder->connect('/login', [
            'controller' => 'Users',
            'action' => 'login'
        ]);

        $builder->connect('/register', [
            'controller' => 'Users',
            'action' => 'register'
        ]);

        $builder->connect('/logout', [
            'controller' => 'Users',
            'action' => 'logout'
        ]);

        // 🔥 PROFILE
        $builder->connect('/profile', [
            'controller' => 'Users',
            'action' => 'profile'
        ]);

        $builder->connect('/profile/edit', [
            'controller' => 'Users',
            'action' => 'editProfile'
        ]);

        // DASHBOARD
        $builder->connect('/dashboard', [
            'controller' => 'Dashboard',
            'action' => 'index'
        ]);

        // CART
        $builder->connect('/cart', [
            'controller' => 'OrderItems',
            'action' => 'index'
        ]);

        // CHECKOUT
        $builder->connect('/checkout', [
            'controller' => 'OrderItems',
            'action' => 'checkout'
        ]);

        // ORDERS
        $builder->connect('/orders', [
            'controller' => 'Orders',
            'action' => 'index'
        ]);

        // DEFAULT
        $builder->connect('/pages/*', 'Pages::display');

        $builder->fallbacks();
    });
};