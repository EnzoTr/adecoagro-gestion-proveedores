<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Purchase> $purchases
 */
?>
<div class="purchases index content glassy mt-5">
    <?= $this->Html->link(__('Agregar Compra'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3 class="fw-semibold opacity-90"><?= __('Compras') ?></h3>
    <div class="table-responsive mt-5">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', ['label' => 'Id Compra']) ?></th>
                    <th><?= $this->Paginator->sort('supplier_id', ['label' => 'Id Proveedor']) ?></th>
                    <th><?= $this->Paginator->sort('date', ['label' => 'Fecha']) ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody class="opacity-75">
                <?php foreach ($purchases as $purchase): ?>
                <tr>
                    <td><?= $this->Number->format($purchase->id) ?></td>
                    <td><?= $purchase->hasValue('supplier') ? $this->Html->link($purchase->supplier->name, ['controller' => 'Suppliers', 'action' => 'view', $purchase->supplier->id]) : '' ?></td>
                    <td><?= h($purchase->date) ?></td>
                    <td class="actions">
                                <?= $this->Html->link('<i class="bi bi-list fs-1"></i>',
                                    ['controller' => 'Purchases', 'action' => 'view', $purchase->id],
                                    ['class' => 'align-items-center', 'escape' => false]) 
                                 ?>
                                <?= $this->Html->link('<i class="bi bi-pencil fs-1"></i>',
                                    ['controller' => 'Purchases', 'action' => 'edit', $purchase->id],
                                    ['class' => 'align-items-center', 'escape' => false]) 
                                 ?>
                                <?= $this->Form->postLink(
                                    '<i class="bi bi-trash fs-1"></i>',
                                    ['controller' => 'Purchases', 'action' => 'delete', $purchase->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Quieres eliminar # {0}?', $purchase->id),
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
        <ul class="pagination justify-content-between align-items-center">
            <?= $this->Paginator->first('<i class="bi bi-chevron-double-left fs-2"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->prev('<i class="bi bi-chevron-left fs-2"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->numbers() ?>
            <p class="opacity-50 fs-5 text-center"><?= $this->Paginator->counter(__('{{page}} - {{pages}}',)) ?></p>
            <?= $this->Paginator->next('<i class="bi bi-chevron-right fs-2"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->last('<i class="bi bi-chevron-double-right fs-2"></i>', ['escape' => false]) ?>
        </ul>
    </div>
</div>