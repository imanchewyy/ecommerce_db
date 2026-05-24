<div class="container mt-4">

    <!-- TITLE -->
    <h2 class="mb-3 text-center text-white">Products</h2>

    <!-- FILTER -->
    <div class="mb-4 text-center">

        <?= $this->Form->create(null, ['type' => 'get']) ?>

        <div class="d-flex justify-content-center">

            <div class="input-group shadow" style="max-width:400px;">

                <?= $this->Form->control('category', [
                    'label' => false,
                    'options' => $categories,
                    'empty' => '🔍 Select Category...',
                    'value' => $categoryId,
                    'class' => 'form-control'
                ]) ?>

                <button class="btn btn-warning">
                    <i class="fa fa-search"></i>
                </button>

            </div>

        </div>

        <?= $this->Form->end() ?>

    </div>

    <!-- PRODUCT GRID -->
    <div class="row">

        <?php if (!empty($products)): ?>

            <?php foreach ($products as $product): ?>
            <div class="col-md-4 col-lg-3 mb-4">

                <div class="card product-card shadow h-100">

                    <!-- IMAGE -->
                    <img src="<?= $this->Url->image('products/product' . $product->id . '.png') ?>"
                         class="card-img-top"
                         style="height:220px; object-fit:contain; background:#f8f9fa; padding:10px;">

                    <div class="card-body text-center">

                        <h5 class="card-title"><?= h($product->name) ?></h5>

                        <p class="text-success fw-bold">
                            RM <?= number_format($product->price, 2) ?>
                        </p>

                        <p class="text-muted">
                            Stock: <?= $product->quantity ?>
                        </p>

                    </div>

                    <!-- 🔥 BUTTONS (CLEAN VERSION) -->
                    <div class="card-footer text-center bg-white border-0">

                        <!-- VIEW -->
                        <?= $this->Html->link(
                            'View',
                            ['action' => 'view', $product->id],
                            ['class' => 'btn btn-info btn-sm']
                        ) ?>

                        <br>

                        <!-- ADD TO CART -->
                        <?= $this->Html->link(
                            'Add to Cart',
                            ['controller' => 'OrderItems', 'action' => 'add', $product->id],
                            ['class' => 'btn btn-primary btn-sm mt-2']
                        ) ?>

                    </div>

                </div>

            </div>
            <?php endforeach; ?>

        <?php else: ?>

            <div class="text-center text-white">
                <h5>No products found 😢</h5>
            </div>

        <?php endif; ?>

    </div>

</div>