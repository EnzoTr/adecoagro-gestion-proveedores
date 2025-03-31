<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\PurchaseDetail> $purchaseDetails
 */
?>
<div class="purchaseDetails index content">
    <?= $this->Html->link(__('Agregar Detalles'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Detalles de Compra') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id',['label' => 'Id']) ?></th>
                    <th><?= $this->Paginator->sort('purchase_id',['label' => 'Id de Compra']) ?></th>
                    <th><?= $this->Paginator->sort('product',['label' => 'Producto']) ?></th>
                    <th><?= $this->Paginator->sort('amount',['label' => 'Cantidad']) ?></th>
                    <th><?= $this->Paginator->sort('price',['label' => 'Precio']) ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($purchaseDetails as $purchaseDetail): ?>
                <tr>
                    <td><?= $this->Number->format($purchaseDetail->id) ?></td>
                    <td><?= $purchaseDetail->hasValue('purchase') ? $this->Html->link($purchaseDetail->purchase->id, ['controller' => 'Purchases', 'action' => 'view', $purchaseDetail->purchase->id]) : '' ?></td>
                    <td><?= h($purchaseDetail->product) ?></td>
                    <td><?= $this->Number->format($purchaseDetail->amount) ?></td>
                    <td><?= $this->Number->format($purchaseDetail->price) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $purchaseDetail->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $purchaseDetail->id]) ?>
                        <?= $this->Form->postLink(
                            __('Eliminar'),
                            ['action' => 'delete', $purchaseDetail->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Quieres eliminar # {0}?', $purchaseDetail->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primero')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('ultimo') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Pagina {{page}} de {{pages}}, mostrando {{current}} filas de {{count}} totales')) ?></p>
    </div>
</div>