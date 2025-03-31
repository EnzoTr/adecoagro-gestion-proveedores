<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Purchase $purchase
 * @var \Cake\Collection\CollectionInterface|string[] $suppliers
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Ver Compras'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="purchases form content">
            <?= $this->Form->create($purchase) ?>
            <fieldset>
                <legend><?= __('Agregar Compra') ?></legend>
                <?php
                    echo $this->Form->control('supplier_id', ['options' => $suppliers, 'label' => 'Compra']);
                ?>

                <div id="purchase-details-container">
                    <h4>Detalles de Compra</h4>
                    <button type="button" id="add-detail-btn" class="button">➕ Agregar Producto</button>
                    <br><br>

                    <div class="purchase-detail">
                        <?= $this->Form->control('purchase_details.0.product', ['label' => 'Producto']); ?>
                        <?= $this->Form->control('purchase_details.0.price', ['label' => 'Precio']); ?>
                        <?= $this->Form->control('purchase_details.0.amount', ['label' => 'Cantidad']); ?>
                        <button type="button" class="remove-detail button alert">❌ Eliminar</button>
                    </div>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Enviar')) ?>
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
            <label for="purchase-details-${detailIndex}-product">Producto</label>
            <input type="text" name="purchase_details[${detailIndex}][product]" required>

            <label for="purchase-details-${detailIndex}-price">Precio</label>
            <input type="number" name="purchase_details[${detailIndex}][price]" step="0.01" required>

            <label for="purchase-details-${detailIndex}-amount">Cantidad</label>
            <input type="number" name="purchase_details[${detailIndex}][amount]" required>

            <button type="button" class="remove-detail button alert">❌ Eliminar</button>
        `;

        container.appendChild(newDiv);
        detailIndex++; // Incrementamos para la siguiente fila
    });

    document.getElementById("purchase-details-container").addEventListener("click", function (event) {
        if (event.target.classList.contains("remove-detail")) {
            event.target.parentElement.remove();
        }
    });
});
</script>