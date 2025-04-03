<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Purchase $purchase
 */
?>
<div class="row mt-5">
    <aside class="col-2">
        <div class="side-nav content px-4 py-2 d-flex flex-column gap-2 glassy" >
            <?= $this->Html->link('<i class="bi bi-list fs-1 me-3"></i> Compras', 
                ['action' => 'index'], 
                ['class' => 'side-nav-item d-flex align-items-center', 'escape' => false]) 
            ?>
            <?= $this->Html->link('<i class="bi bi-plus-circle fs-1 me-3"></i> Agregar', 
                ['action' => 'add'], 
                ['class' => 'side-nav-item d-flex align-items-center', 'escape' => false]) 
            ?>
            <?= $this->Html->link('<i class="bi bi-pencil fs-1 me-3"></i> Editar', 
                ['action' => 'edit', $purchase->id], 
                ['class' => 'side-nav-item d-flex align-items-center', 'escape' => false]) 
            ?>
            <?= $this->Form->postLink('<i class="bi bi-trash fs-1 me-3"></i> Eliminar', 
                ['action' => 'delete', $purchase->id], 
                ['confirm' => __('Quieres eliminar Compra # {0}?', $purchase->id), 
                'class' => 'side-nav-item d-flex align-items-center', 'escape' => false]) 
            ?>
            
        </div>
    </aside>
    <div class="col-10">
        <div class="purchases view content glassy">
            <h3 class="fw-semibold">Número de Compra #<?= h($purchase->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Proveedor') ?></th>
                    <td><?= $purchase->hasValue('supplier') ? $this->Html->link($purchase->supplier->name, ['controller' => 'Suppliers', 'action' => 'view', $purchase->supplier->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Compra') ?></th>
                    <td><?= $this->Number->format($purchase->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha') ?></th>
                    <td><?= h($purchase->date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Detalles de Compra relacionados') ?></h4>
                <?php if (!empty($purchase->purchase_details)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id Detalles') ?></th>
                            
                            <th><?= __('Producto') ?></th>
                            <th><?= __('Cantidad') ?></th>
                            <th><?= __('Precio') ?></th>
                            <th class="actions"><?= __('Acciones') ?></th>
                        </tr>
                        <?php foreach ($purchase->purchase_details as $purchaseDetail) : ?>
                        <tr>
                            <td><?= h($purchaseDetail->id) ?></td>
                            
                            <td><?= h($purchaseDetail->product) ?></td>
                            <td><?= h($purchaseDetail->amount) ?></td>
                            <td><?= h($purchaseDetail->price) ?></td>
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
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>