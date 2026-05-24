<div class="container mt-4">

    <!-- 🔥 TITLE -->
    <h2 class="text-white mb-4">
        <i class="fa fa-box"></i> My Orders
    </h2>

    <?php if (!empty($orders)): ?>

        <?php foreach ($orders as $order): ?>

        <div class="card mb-4 shadow-sm" style="border-radius:15px;">

            <!-- 🔥 HEADER -->
            <div class="card-header d-flex justify-content-between align-items-center"
                 style="background:#f8f9fa; border-radius:15px 15px 0 0;">

                <div>
                    <strong>Order #<?= $order->id ?></strong><br>
                    <small class="text-muted">
                        <?= date('d M Y, H:i', strtotime($order->created)) ?>
                    </small>
                </div>

                <div class="text-success fw-bold">
                    RM <?= number_format($order->total, 2) ?>
                </div>

            </div>

            <!-- 🔥 BODY -->
            <div class="card-body">

                <div class="row">

                    <!-- 📦 PRODUCTS LIST -->
                    <div class="col-md-8">
                        <h6 class="mb-2">Products:</h6>

                        <?php foreach ($order->order_items as $item): ?>
                            <div class="d-flex align-items-center mb-2">

                                <!-- IMAGE -->
                                <img src="<?= $this->Url->image('products/product' . $item->product->id . '.png') ?>"
                                     style="height:50px; width:50px; object-fit:contain; margin-right:10px;">

                                <!-- NAME -->
                                <span><?= h($item->product->name) ?></span>

                            </div>
                        <?php endforeach; ?>

                    </div>

                    <!-- 🔍 ACTION -->
                    <div class="col-md-4 text-end d-flex align-items-center justify-content-end">

                        <?= $this->Html->link(
                            '<i class="fa fa-eye"></i> View Details',
                            ['action' => 'view', $order->id],
                            [
                                'class' => 'btn btn-info btn-sm',
                                'escape' => false
                            ]
                        ) ?>

                    </div>

                </div>

            </div>

        </div>

        <?php endforeach; ?>

    <?php else: ?>

        <!-- ❌ EMPTY -->
        <div class="text-center text-white">
            <h4><i class="fa fa-box-open"></i> No orders yet 😢</h4>
        </div>

    <?php endif; ?>

</div>