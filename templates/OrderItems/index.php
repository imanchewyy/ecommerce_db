<div class="container mt-4">

    <!-- 🔥 TITLE -->
    <h2 class="text-white mb-4">
        <i class="fa fa-shopping-cart"></i> Shopping Cart
    </h2>

    <?php if (!empty($cart)): ?>

        <!-- 🔥 TOTAL ITEM -->
        <div class="mb-3 text-white">
            <strong>Total Items:</strong> <?= count($cart) ?>
        </div>

        <?php foreach ($cart as $id => $item): ?>
        <div class="card mb-3 shadow-sm" style="border-radius:15px;">

            <div class="row align-items-center p-2">

                <!-- IMAGE -->
                <div class="col-md-2 text-center">
                    <img src="<?= $this->Url->image('products/product' . $id . '.png') ?>"
                         style="height:100px; object-fit:contain;">
                </div>

                <!-- PRODUCT NAME -->
                <div class="col-md-3">
                    <h5><?= h($item['name']) ?></h5>
                </div>

                <!-- PRICE -->
                <div class="col-md-2 text-center text-muted">
                    RM <?= number_format($item['price'], 2) ?>
                </div>

                <!-- QUANTITY -->
                <div class="col-md-2 text-center">
                    <strong>Qty:</strong> <?= $item['quantity'] ?>
                </div>

                <!-- TOTAL -->
                <div class="col-md-2 text-center text-success fw-bold">
                    RM <?= number_format($item['price'] * $item['quantity'], 2) ?>
                </div>

                <!-- REMOVE BUTTON -->
                <div class="col-md-1 text-center">
                    <?= $this->Html->link(
                        '<i class="fa fa-trash"></i>',
                        ['action' => 'remove', $id],
                        [
                            'escape' => false,
                            'class' => 'btn btn-danger btn-sm'
                        ]
                    ) ?>
                </div>

            </div>

        </div>
        <?php endforeach; ?>

        <!-- 🔥 TOTAL PRICE -->
        <div class="card p-3 mt-4 shadow text-end" style="border-radius:15px;">
            <h4>
                Total: 
                <span class="text-success">RM <?= number_format($total, 2) ?></span>
            </h4>

            <?= $this->Html->link(
                'Checkout',
                ['action' => 'checkout'],
                ['class' => 'btn btn-success mt-2']
            ) ?>
        </div>

    <?php else: ?>

        <!-- EMPTY CART -->
        <div class="text-center text-white">
            <h4><i class="fa fa-shopping-cart"></i> Cart kosong 😢</h4>
        </div>

    <?php endif; ?>

</div>