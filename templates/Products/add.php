<div class="container mt-4">

    <h2 class="mb-4 text-white">Add Product</h2>

    <?= $this->Form->create($product) ?>

    <!-- PRODUCT NAME -->
    <div class="mb-3">
        <?= $this->Form->control('name', [
            'class' => 'form-control',
            'label' => 'Product Name',
            'required' => true
        ]) ?>
    </div>

    <!-- PRICE -->
    <div class="mb-3">
        <?= $this->Form->control('price', [
            'class' => 'form-control',
            'label' => 'Price (RM)',
            'required' => true
        ]) ?>
    </div>

    <!-- QUANTITY -->
    <div class="mb-3">
        <?= $this->Form->control('quantity', [
            'class' => 'form-control',
            'label' => 'Stock Quantity',
            'required' => true
        ]) ?>
    </div>

    <!-- 🔥 CATEGORY (IMPORTANT) -->
    <div class="mb-3">
        <?= $this->Form->control('category_id', [
            'label' => 'Category',
            'options' => $categories,
            'class' => 'form-control',
            'empty' => 'Select Category',
            'required' => true
        ]) ?>
    </div>

    <!-- DESCRIPTION -->
    <div class="mb-3">
        <?= $this->Form->control('description', [
            'type' => 'textarea',
            'class' => 'form-control',
            'label' => 'Description',
            'rows' => 3
        ]) ?>
    </div>

    <!-- SPECIFICATION -->
    <div class="mb-3">
        <?= $this->Form->control('specification', [
            'type' => 'textarea',
            'class' => 'form-control',
            'label' => 'Specification',
            'rows' => 3
        ]) ?>
    </div>

    <!-- MATERIAL -->
    <div class="mb-3">
        <?= $this->Form->control('material', [
            'class' => 'form-control',
            'label' => 'Material'
        ]) ?>
    </div>

    <!-- BUTTON -->
    <div class="mt-4">

        <button class="btn btn-success">
            Save Product
        </button>

        <?= $this->Html->link(
            'Back',
            ['action' => 'index'],
            ['class' => 'btn btn-secondary ms-2']
        ) ?>

    </div>

    <?= $this->Form->end() ?>

</div>