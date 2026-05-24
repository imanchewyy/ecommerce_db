<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ProductsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('products');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        // TIMESTAMP
        $this->addBehavior('Timestamp');

        // RELATIONSHIP
        $this->hasMany('OrderItems', [
            'foreignKey' => 'product_id',
        ]);

        // 🔥 IMPORTANT (CATEGORY)
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->scalar('specification')
            ->allowEmptyString('specification');

        $validator
            ->scalar('material')
            ->maxLength('material', 255)
            ->allowEmptyString('material');

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->integer('quantity')
            ->allowEmptyString('quantity');

        return $validator;
    }
}