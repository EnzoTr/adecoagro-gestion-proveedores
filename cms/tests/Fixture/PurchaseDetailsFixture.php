<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PurchaseDetailsFixture
 */
class PurchaseDetailsFixture extends TestFixture
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
                'purchase_id' => 1,
                'product' => 'Lorem ipsum dolor sit amet',
                'amount' => 1,
                'price' => 1.5,
            ],
        ];
        parent::init();
    }
}
