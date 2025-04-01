<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Purchase $purchase
 * @var \Cake\Collection\CollectionInterface|string[] $suppliers
 */
?>
<div class="row mt-5">
    <aside class="col-2">
        <div class="side-nav content px-4 py-2 d-flex flex-column gap-2 glassy" >
            <?= $this->Html->link('<i class="bi bi-list fs-1 me-3"></i> Compras', 
                ['action' => 'index'], 
                ['class' => 'side-nav-item d-flex align-items-center', 'escape' => false]) 
            ?>
            <!-- <a id="add-detail-btn" style="cursor:pointer" class="side-nav-item d-flex align-items-center cursor-pointer"><i class="bi bi-list fs-1 me-3"></i> Agregar Producto</a> -->
        </div>
    </aside>
    <div class="col-10">
        <div class="purchases form content glassy">
            <?= $this->Form->create($purchase) ?>
            <fieldset class=" d-flex flex-column gap-3">
            <h3 class="fw-semibold mb-4"><?= __('Agregar Compra') ?></h3>
                <?php
                    echo $this->Form->control('supplier_id', ['options' => $suppliers, 'label' => false,'placeholder' => 'Proveedor', 'class'=>'border-0 bg-secondary bg-opacity-10  rounded-4']);
                ?>
    
                <div id="purchase-details-container">
                    
                    <div class="purchase-detail">
                        <h4 class="mt-5"><i style="cursor:pointer" class="remove-detail bi bi-trash3 me-3"></i>  Detalles de Compra</h4>
                        <?= $this->Form->control('purchase_details.0.product', ['label'=>false,'placeholder' => 'Producto', 'class'=>'border-0 bg-secondary bg-opacity-10 glassy2 rounded-4 p-5']); ?>
                        <?= $this->Form->control('purchase_details.0.price', ['label'=>false,'placeholder' => 'Precio', 'class'=>'border-0 bg-secondary bg-opacity-10 glassy2 rounded-4 p-5']); ?>
                        <?= $this->Form->control('purchase_details.0.amount', ['label'=>false,'placeholder' => 'Cantidad', 'class'=>'border-0 bg-secondary bg-opacity-10 glassy2 rounded-4 p-5']); ?>
                    </div>
                </div>
            </fieldset>
            <button type="button" id="add-detail-btn" class="button d-flex  align-items-center"><i class="bi bi-plus-circle fs-3 me-3"></i> Agregar Producto</button>
            <?= $this->Form->button(__('Enviar'),['class'=>'']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    let detailIndex = 1; // Empezamos en 1 porque el primero ya está en el HTML
    let addDetailBtn = document.getElementById("add-detail-btn");

    addDetailBtn.addEventListener("click", function () {

        const container = document.getElementById("purchase-details-container");
        const newDiv = document.createElement("div");

        newDiv.classList.add("purchase-detail");
        newDiv.innerHTML = `
            <hr>
            <h4 class="mt-5"><i style="cursor:pointer" class="remove-detail bi bi-trash3 me-3"></i>  Detalles de Compra</h4>
            <input placeholder="Producto" class="border-0 bg-secondary bg-opacity-10 glassy2 rounded-4 p-5" type="text" name="purchase_details[${detailIndex}][product]" required>

            <input placeholder="Precio" class="border-0 bg-secondary bg-opacity-10 glassy2 rounded-4 p-5" type="number" name="purchase_details[${detailIndex}][price]" step="0.01" required>
            
            <input placeholder="Cantidad" class="border-0 bg-secondary bg-opacity-10 glassy2 rounded-4 p-5" type="number" name="purchase_details[${detailIndex}][amount]" required>

        `;

        container.appendChild(newDiv);
        detailIndex++; // Incrementamos para la siguiente fila
    });

    document.getElementById("purchase-details-container").addEventListener("click", function (event) {
        if (event.target.classList.contains("remove-detail")) {
            event.target.closest(".purchase-detail").remove();
        }
    });
});
</script>