<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class User extends Entity
{
    protected array $_accessible = [
    'username' => true,
    'email' => true,
    'phone' => true,
    'password' => true,
    'created' => true,
    'modified' => true,
];

    protected array $_hidden = [
        'password',
    ];

    // 🔐 HASH PASSWORD FIX
    protected function _setPassword($password)
    {
        if (!empty($password)) {
            return password_hash($password, PASSWORD_DEFAULT);
        }
    }
}