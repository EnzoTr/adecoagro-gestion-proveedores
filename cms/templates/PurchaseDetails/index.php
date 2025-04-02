<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\PurchaseDetail> $purchaseDetails
 */
?>
<div class="suppliers index content glassy mt-5">
    <?= $this->Html->link(__('Agregar Detalles'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3 class="fw-semibold opacity-90"><?= __('Detalles de Compra') ?></h3>
    <div class="table-responsive mt-5">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id',['label' => 'Id Detalles']) ?></th>
                    <th><?= $this->Paginator->sort('purchase_id',['label' => 'Id de Compra']) ?></th>
                    <th><?= $this->Paginator->sort('product',['label' => 'Producto']) ?></th>
                    <th><?= $this->Paginator->sort('amount',['label' => 'Cantidad']) ?></th>
                    <th><?= $this->Paginator->sort('price',['label' => 'Precio']) ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody class="opacity-75">
                <?php foreach ($purchaseDetails as $purchaseDetail): ?>
                <tr>
                    <td><?= $this->Number->format($purchaseDetail->id) ?></td>
                    <td><?= $purchaseDetail->hasValue('purchase') ? $this->Html->link($purchaseDetail->purchase->id, ['controller' => 'Purchases', 'action' => 'view', $purchaseDetail->purchase->id]) : '' ?></td>
                    <td><?= h($purchaseDetail->product) ?></td>
                    <td><?= $this->Number->format($purchaseDetail->amount) ?></td>
                    <td><?= $this->Number->format($purchaseDetail->price) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('<i class="bi bi-list fs-1"></i>',
                            ['controller' => 'PurchaseDetails', 'action' => 'view', $purchaseDetail->id],
                            ['class' => 'align-items-center', 'escape' => false]) 
                            ?>
                        <?= $this->Html->link('<i class="bi bi-pencil fs-1"></i>',
                            ['controller' => 'PurchaseDetails', 'action' => 'edit', $purchaseDetail->id],
                            ['class' => 'align-items-center', 'escape' => false]) 
                            ?>
                        <?= $this->Form->postLink(
                            '<i class="bi bi-trash fs-1"></i>',
                            ['controller' => 'PurchaseDetails', 'action' => 'delete', $purchaseDetail->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Quieres eliminar # {0}?', $purchaseDetail->id),
                                'class' => 'align-items-center', 'escape' => false,
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination justify-content-between align-items-center my-4">
            <?= $this->Paginator->first('<i class="bi bi-chevron-double-left fs-2"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->prev('<i class="bi bi-chevron-left fs-2"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->numbers() ?>
            
            <?= $this->Paginator->next('<i class="bi bi-chevron-right fs-2"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->last('<i class="bi bi-chevron-double-right fs-2"></i>', ['escape' => false]) ?>
        </ul>
        <p class="opacity-50 fs-5 text-center"><?= $this->Paginator->counter(__('{{page}} - {{pages}}',)) ?></p>
    </div>
</div>