<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;

class UsersTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('username');
        $this->setPrimaryKey('id');

        // TIMESTAMP
        $this->addBehavior('Timestamp');

        // RELATIONSHIP
        $this->hasMany('Orders', [
            'foreignKey' => 'user_id',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        // USERNAME
        $validator
            ->scalar('username')
            ->maxLength('username', 50)
            ->requirePresence('username', 'create')
            ->notEmptyString('username');

        // EMAIL
        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        // PHONE
        $validator
            ->scalar('phone')
            ->maxLength('phone', 20)
            ->requirePresence('phone', 'create')
            ->notEmptyString('phone');

        // PASSWORD
        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        // UNIQUE USERNAME
        $rules->add($rules->isUnique(['username']), [
            'errorField' => 'username',
            'message' => 'Username sudah digunakan'
        ]);

        // UNIQUE EMAIL
        $rules->add($rules->isUnique(['email']), [
            'errorField' => 'email',
            'message' => 'Email sudah digunakan'
        ]);

        return $rules;
    }
}