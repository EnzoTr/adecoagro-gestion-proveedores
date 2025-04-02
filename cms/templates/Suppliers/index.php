<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Supplier> $suppliers
 */
?>
<div class="suppliers index content glassy mt-5 col-12">
    <?= $this->Html->link(__('Agregar Proveedor'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3 class="fw-semibold opacity-90"><?= __('Proveedores') ?></h3>
    <div class="table-responsive mt-5">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id',            ['label' => 'Id Proveedor']) ?></th>
                    <th><?= $this->Paginator->sort('name',          ['label' => 'Nombre']) ?></th>
                    <th><?= $this->Paginator->sort('address',       ['label' => 'Direccion']) ?></th>
                    <th><?= $this->Paginator->sort('phone',         ['label' => 'Telefono']) ?></th>
                    <th><?= $this->Paginator->sort('email',         ['label' => 'Email']) ?></th>
                    <th><?= $this->Paginator->sort('register_date', ['label' => 'Fecha de Registro']) ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody class="opacity-75">
                <?php foreach ($suppliers as $supplier): ?>
                <tr class=" h-100 align-items-center justify-center">
                    <td><?= $this->Number->format($supplier->id) ?></td>
                    <td><?= h($supplier->name) ?></td>
                    <td><?= h($supplier->address) ?></td>
                    <td><?= h($supplier->phone) ?></td>
                    <td title="<?= h($supplier->email) ?>"><?= h($supplier->email) ?></td>
                    <td><?= h($supplier->register_date) ?></td>
                    <td class="actions h-100 align-items-center justify-center">
                    <ul class="d-flex align-items-center justify-center gap-2 h-100">
                        <li><?= $this->Html->link('<i class="bi bi-list fs-2"></i>', ['action' => 'view', $supplier->id], ['escape' => false]) ?></li>
                        <li><?= $this->Html->link('<i class="bi bi-pencil fs-2"></i>', ['action' => 'edit', $supplier->id], ['escape' => false]) ?></li>
                        <li><?= $this->Form->postLink('<i class="bi bi-trash fs-2"></i>', ['action' => 'delete', $supplier->id], ['method' => 'delete', 'confirm' => __('Quieres eliminar # {0}?', $supplier->id), 'escape' => false]) ?></li>
                    </ul>
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