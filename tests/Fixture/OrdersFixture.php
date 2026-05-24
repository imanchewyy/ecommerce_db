<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdersFixture
 */
class OrdersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'user_id' => 1,
                'total' => 1.5,
                'status' => 'Lorem ipsum dolor sit amet',
                'created' => '2026-05-23 00:37:52',
            ],
        ];
        parent::init();
    }
}
