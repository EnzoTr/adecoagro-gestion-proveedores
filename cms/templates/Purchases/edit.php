<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Purchase $purchase
 * @var string[]|\Cake\Collection\CollectionInterface $suppliers
 */
?>
<div class="row mt-5">
    <aside class="col-2">
        <div class="side-nav content px-4 py-2 d-flex flex-column gap-2 glassy">
            <?= $this->Html->link('<i class="bi bi-list fs-1 me-3"></i> Compras', 
                ['action' => 'index'], 
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
        <div class="purchases form content glassy">
            <?= $this->Form->create($purchase) ?>
            <fieldset class=" d-flex flex-column gap-3">
                <h3 class="fw-semibold mb-4"><?= __('Editar Compra') ?></h3>
                <?php
                    echo $this->Form->control('supplier_id', ['options' => $suppliers, 'label' => false,'placeholder' => 'Proveedor', 'class'=>'border-0 bg-secondary bg-opacity-10  rounded-4']);
                    echo $this->Form->control('date',        ['label' => false,'placeholder' => 'Fecha', 'class'=>'border-0 bg-secondary bg-opacity-10  rounded-4']);
                ?>

                <div id="purchase-details-container">
                    
                    <?php foreach ($purchase->purchase_details as $index => $detail): ?>
                        <div class="purchase-detail">
                            <h4 class="mt-5"><i style="cursor:pointer" class="remove-detail bi bi-trash3 me-3"></i>  Detalles de Compra</h4>
                            <?= $this->Form->control("purchase_details.{$index}.product", ['value' => $detail->product, 'label'=>false,'placeholder' => 'Nombre', 'class'=>'border-0 bg-secondary bg-opacity-10 glassy2 rounded-4 p-5']);?>
                            <?= $this->Form->control("purchase_details.{$index}.price", ['type' => 'number', 'step' => '0.01', 'value' => $detail->price, 'label'=>false,'placeholder' => 'Nombre', 'class'=>'border-0 bg-secondary bg-opacity-10 glassy2 rounded-4 p-5']);?>
                            <?= $this->Form->control("purchase_details.{$index}.amount", ['type' => 'number', 'value' => $detail->amount, 'label'=>false,'placeholder' => 'Nombre', 'class'=>'border-0 bg-secondary bg-opacity-10 glassy2 rounded-4 p-5']);?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </fieldset>
            <button type="button" id="add-detail" class="button d-flex align-items-center"><i class="bi bi-plus-circle fs-3 me-3"></i> Agregar Producto</button>
            <?= $this->Form->button(__('Enviar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    let detailIndex = document.querySelectorAll(".purchase-detail").length; // Cantidad de detalles existentes

    document.getElementById("add-detail").addEventListener("click", function () {
        const container = document.getElementById("purchase-details-container");

        const detailDiv = document.createElement("div");
        detailDiv.classList.add("purchase-detail");
        detailDiv.innerHTML = `
            <hr>
            <h4 class="mt-5"><i style="cursor:pointer" class="remove-detail bi bi-trash3 me-3"></i>  Detalles de Compra</h4>
            <input placeholder="Producto" class="border-0 bg-secondary bg-opacity-10 glassy2 rounded-4 p-5"  type="text" name="purchase_details[${detailIndex}][product]" required>


            <input placeholder="Producto" class="border-0 bg-secondary bg-opacity-10 glassy2 rounded-4 p-5"  type="number" name="purchase_details[${detailIndex}][price]" step="0.01" required>


            <input placeholder="Producto" class="border-0 bg-secondary bg-opacity-10 glassy2 rounded-4 p-5"  type="number" name="purchase_details[${detailIndex}][amount]" required>

        `;

        container.appendChild(detailDiv);
        detailIndex++;
    });

    document.getElementById("purchase-details-container").addEventListener("click", function (event) {
        if (event.target.classList.contains("remove-detail")) {
            event.target.closest(".purchase-detail").remove();
        }
    });
});
</script>