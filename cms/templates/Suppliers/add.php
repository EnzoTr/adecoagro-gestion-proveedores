<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supplier $supplier
 */
?>
<div class="row mt-5">
    <aside class="col-2">
        <div class="side-nav content px-4 py-2 d-flex flex-column gap-2 glassy">
            <?= $this->Html->link('<i class="bi bi-list fs-1 me-3"></i> Proveedores', 
                ['action' => 'index'], 
                ['class' => 'side-nav-item d-flex align-items-center', 'escape' => false]) 
            ?>
        </div>
    </aside>
    <div class="col-10">
        <div class="suppliers form content glassy">
            <?= $this->Form->create($supplier) ?>
            <fieldset class=" d-flex flex-column gap-3">
                <h3 class="fw-semibold mb-5"><?= __('Agregar Proveedor') ?></h3>
                <?php
                    echo $this->Form->control('register_date', ['label'=>false,'placeholder' => 'Fecha', 'style'=>'display: none']);
                    echo $this->Form->control('name', ['label'=>false,'placeholder' => 'Nombre', 'class'=>'border-0 bg-secondary bg-opacity-10 glassy2 rounded-4 p-5']);
                    echo $this->Form->control('address', ['label'=>false,'placeholder' => 'Direccion', 'class'=>'border-0 bg-secondary bg-opacity-10 glassy2 rounded-4 p-5']);
                    echo $this->Form->control('phone', ['label'=>false,'placeholder' => 'Telefono', 'class'=>'border-0 bg-secondary bg-opacity-10 glassy2 rounded-4 p-5']);
                    echo $this->Form->control('email', ['label'=>false,'placeholder' => 'Email', 'class'=>'border-0 bg-secondary bg-opacity-10 glassy2 rounded-4 p-5']);

                ?>
            </fieldset>
            <?= $this->Form->button(__('Enviar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
