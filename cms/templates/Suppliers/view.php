<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supplier $supplier
 */
?>
<div class="row mt-5">
    <aside class="col-2">
        <div class="side-nav content px-4 py-2 d-flex flex-column gap-2 glassy" >
            <?= $this->Html->link('<i class="bi bi-list fs-1 me-3"></i> Proveedores', 
                ['action' => 'index'], 
                ['class' => 'side-nav-item d-flex align-items-center', 'escape' => false]) 
            ?>
            <?= $this->Html->link('<i class="bi bi-plus-circle fs-1 me-3"></i> Agregar', 
                ['action' => 'add'], 
                ['class' => 'side-nav-item d-flex align-items-center', 'escape' => false]) 
            ?>
            <?= $this->Html->link('<i class="bi bi-pencil fs-1 me-3"></i> Editar', 
                ['action' => 'edit', $supplier->id], 
                ['class' => 'side-nav-item d-flex align-items-center', 'escape' => false]) 
            ?>
            <?= $this->Form->postLink('<i class="bi bi-trash fs-1 me-3"></i> Eliminar', 
                ['action' => 'delete', $supplier->id], 
                ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id), 
                'class' => 'side-nav-item d-flex align-items-center', 'escape' => false]) 
            ?>
            
        </div>
    </aside>
    <div class="col-10">
        <div class="suppliers view content glassy">
            <h3 class="fw-semibold"><?= h($supplier->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($supplier->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Direccion') ?></th>
                    <td><?= h($supplier->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefono') ?></th>
                    <td><?= h($supplier->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($supplier->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Proveedor') ?></th>
                    <td><?= $this->Number->format($supplier->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha de Registro') ?></th>
                    <td><?= h($supplier->register_date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Compras Relacionadas') ?></h4>
                <?php if (!empty($supplier->purchases)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id Compra') ?></th>
                            <th><?= __('Id Proveedor') ?></th>
                            <th><?= __('Fecha') ?></th>
                            <th class="actions"><?= __('Acciones') ?></th>
                        </tr>
                        <?php foreach ($supplier->purchases as $purchase) : ?>
                        <tr>
                            <td><?= h($purchase->id) ?></td>
                            <td><?= h($purchase->supplier_id) ?></td>
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
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>