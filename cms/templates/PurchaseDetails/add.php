<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchaseDetail $purchaseDetail
 * @var \Cake\Collection\CollectionInterface|string[] $purchases
 */
?>
<div class="row mt-5">
    <aside class="col-2">
        <div class="side-nav content px-4 py-2 d-flex flex-column gap-2 glassy" >
            <?= $this->Html->link('<i class="bi bi-list fs-1 me-3"></i> Detalles', 
                ['action' => 'index'], 
                ['class' => 'side-nav-item d-flex align-items-center', 'escape' => false]) 
            ?>
            
        </div>
    </aside>
    <div class="col-10">
        <div class="purchaseDetails form content glassy">
            <?= $this->Form->create($purchaseDetail) ?>
            <fieldset>
                <h3 class="fw-semibold mb-5"><?= __('Agregar Detalles') ?></h3>
                <?php
                    echo $this->Form->control('purchase_id', ['options'=>$purchases, 'label' => 'Compra','placeholder' => 'Proveedor', 'class'=>'border-0 bg-secondary bg-opacity-10  rounded-4 mb-5']);
                   
                    echo $this->Form->control('product', ['label'=>false,'placeholder' => 'Producto', 'class'=>'border-0 bg-secondary bg-opacity-10 glassy2 rounded-4 p-5']);
                    echo $this->Form->control('price', ['label'=>false,'placeholder' => 'Precio', 'class'=>'border-0 bg-secondary bg-opacity-10 glassy2 rounded-4 p-5']);
                    echo $this->Form->control('amount', ['label'=>false,'placeholder' => 'Cantidad', 'class'=>'border-0 bg-secondary bg-opacity-10 glassy2 rounded-4 p-5']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Enviar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
