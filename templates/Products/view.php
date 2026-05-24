<div class="container mt-4">

    <div class="row">

        <!-- 🔥 IMAGE -->
        <div class="col-md-5 text-center">

            <div style="background:#f8f9fa; padding:20px; border-radius:10px;">

                <img src="<?= $this->Url->image('products/product' . $product->id . '.png') ?>"
                     class="img-fluid"
                     style="max-height:350px; object-fit:contain;">

            </div>

        </div>

        <!-- 🔥 DETAILS -->
        <div class="col-md-7">

            <h2 class="fw-bold"><?= h($product->name) ?></h2>

            <h4 class="text-success fw-bold mb-3">
                RM <?= number_format($product->price, 2) ?>
            </h4>

            <p class="text-muted">
                Stock: <?= $product->quantity ?>
            </p>

            <!-- 🔥 DESCRIPTION -->
            <div class="mt-4">
                <h5 class="fw-bold">Description</h5>
                <p><?= nl2br(h($product->description)) ?></p>
            </div>

            <!-- 🔥 SPECIFICATION -->
            <div class="mt-4">
                <h5 class="fw-bold">Specification</h5>
                <p><?= nl2br(h($product->specification)) ?></p>
            </div>

            <!-- 🔥 MATERIAL -->
            <div class="mt-4">
                <h5 class="fw-bold">Material</h5>
                <p><?= h($product->material) ?></p>
            </div>

            <!-- 🔥 BUTTON -->
            <div class="mt-4">

                <?= $this->Html->link(
                    'Add to Cart',
                    ['controller' => 'OrderItems', 'action' => 'add', $product->id],
                    ['class' => 'btn btn-primary me-2']
                ) ?>

                <?= $this->Html->link(
                    'Back',
                    ['action' => 'index'],
                    ['class' => 'btn btn-secondary']
                ) ?>

            </div>

        </div>

    </div>

</div>