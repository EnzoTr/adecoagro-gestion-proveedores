<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchaseDetail $purchaseDetail
 * @var string[]|\Cake\Collection\CollectionInterface $purchases
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $purchaseDetail->id],
                ['confirm' => __('Quieres eliminar # {0}?', $purchaseDetail->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Ver Detalles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="purchaseDetails form content">
            <?= $this->Form->create($purchaseDetail) ?>
            <fieldset>
                <legend><?= __('Editar Detalles') ?></legend>
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
