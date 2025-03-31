<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Purchase $purchase
 * @var string[]|\Cake\Collection\CollectionInterface $suppliers
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Purchases'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="purchases form content">
            <?= $this->Form->create($purchase) ?>
            <fieldset>
                <legend><?= __('Edit Purchase') ?></legend>
                <?php
                    echo $this->Form->control('supplier_id', ['options' => $suppliers]);
                    echo $this->Form->control('date');
                ?>

                <div id="purchase-details-container">
                    <h4>Purchase Details</h4>
                    <button type="button" id="add-detail" class="button">➕ Add Product</button>
                    <br><br>
                    <?php foreach ($purchase->purchase_details as $index => $detail): ?>
                        <div class="purchase-detail">
                            <?= $this->Form->hidden("purchase_details.{$index}.id", ['value' => $detail->id]) ?>
                            <?= $this->Form->control("purchase_details.{$index}.product", ['value' => $detail->product]) ?>
                            <?= $this->Form->control("purchase_details.{$index}.price", ['type' => 'number', 'step' => '0.01', 'value' => $detail->price]) ?>
                            <?= $this->Form->control("purchase_details.{$index}.amount", ['type' => 'number', 'value' => $detail->amount]) ?>
                            <button type="button" class="remove-detail button alert">❌ Remove</button>
                        </div>
                    <?php endforeach; ?>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
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
            <label for="purchase-details-${detailIndex}-product">Product</label>
            <input type="text" name="purchase_details[${detailIndex}][product]" required>

            <label for="purchase-details-${detailIndex}-price">Price</label>
            <input type="number" name="purchase_details[${detailIndex}][price]" step="0.01" required>

            <label for="purchase-details-${detailIndex}-amount">Amount</label>
            <input type="number" name="purchase_details[${detailIndex}][amount]" required>

            <button type="button" class="remove-detail button alert">❌ Remove</button>
        `;

        container.appendChild(detailDiv);
        detailIndex++;
    });

    document.getElementById("purchase-details-container").addEventListener("click", function (event) {
        if (event.target.classList.contains("remove-detail")) {
            event.target.parentElement.remove();
        }
    });
});
</script>