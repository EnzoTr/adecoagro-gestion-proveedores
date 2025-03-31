<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchaseDetail $purchaseDetail
 * @var \Cake\Collection\CollectionInterface|string[] $purchases
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Ver Detalles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="purchaseDetails form content">
            <?= $this->Form->create($purchaseDetail) ?>
            <fieldset>
                <legend><?= __('Agregar Detalles') ?></legend>
                <?php
                    echo $this->Form->control('purchase_id', ['options' => $purchases, 'label' => 'Compra']);
                    echo $this->Form->control('product', ['label' => 'Producto']);
                    echo $this->Form->control('amount', ['label' => 'Cantidad']);
                    echo $this->Form->control('price', ['label' => 'Precio']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Enviar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
