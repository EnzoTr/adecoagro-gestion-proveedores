<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchaseDetail $purchaseDetail
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Editar Detalles'), ['action' => 'edit', $purchaseDetail->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar Detalles'), ['action' => 'delete', $purchaseDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseDetail->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Ver Detalles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Agregar Detalles'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="purchaseDetails view content">
            <h3><?= h($purchaseDetail->product) ?></h3>
            <table>
                <tr>
                    <th><?= __('Compra') ?></th>
                    <td><?= $purchaseDetail->hasValue('purchase') ? $this->Html->link($purchaseDetail->purchase->id, ['controller' => 'Purchases', 'action' => 'view', $purchaseDetail->purchase->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Producto') ?></th>
                    <td><?= h($purchaseDetail->product) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($purchaseDetail->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cantidad') ?></th>
                    <td><?= $this->Number->format($purchaseDetail->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Precio') ?></th>
                    <td><?= $this->Number->format($purchaseDetail->price) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>