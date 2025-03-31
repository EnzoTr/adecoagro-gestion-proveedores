<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PurchaseDetail Entity
 *
 * @property int $id
 * @property int $purchase_id
 * @property string $product
 * @property int $amount
 * @property string $price
 *
 * @property \App\Model\Entity\Purchase $purchase
 */
class PurchaseDetail extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'purchase_id' => true,
        'product' => true,
        'amount' => true,
        'price' => true,
        'purchase' => true,
    ];
}
