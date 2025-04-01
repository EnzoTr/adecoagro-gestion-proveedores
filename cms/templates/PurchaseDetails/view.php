<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchaseDetail $purchaseDetail
 */
?>
<div class="row mt-5">
    <aside class="col-2">
        <div class="side-nav content px-4 py-2 d-flex flex-column gap-2 glassy" >
            <?= $this->Html->link('<i class="bi bi-list fs-1 me-3"></i> Detalles', 
                ['action' => 'index'], 
                ['class' => 'side-nav-item d-flex align-items-center', 'escape' => false]) 
            ?>
            <?= $this->Html->link('<i class="bi bi-plus-circle fs-1 me-3"></i> Agregar', 
                ['action' => 'add'], 
                ['class' => 'side-nav-item d-flex align-items-center', 'escape' => false]) 
            ?>
            <?= $this->Html->link('<i class="bi bi-pencil fs-1 me-3"></i> Editar', 
                ['action' => 'edit', $purchaseDetail->id], 
                ['class' => 'side-nav-item d-flex align-items-center', 'escape' => false]) 
            ?>
            <?= $this->Form->postLink('<i class="bi bi-trash fs-1 me-3"></i> Eliminar', 
                ['action' => 'delete', $purchaseDetail->id], 
                ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseDetail->id), 
                'class' => 'side-nav-item d-flex align-items-center', 'escape' => false]) 
            ?>
            
        </div>
    </aside>
    <div class="col-10">
        <div class="purchaseDetails view content glassy">
            <h3 class="fw-semibold"><?= h($purchaseDetail->product) ?></h3>
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