<div class="container mt-4">

    <!-- 🔥 TITLE -->
    <h2 class="text-white mb-4">
        <i class="fa fa-receipt"></i> Order Details
    </h2>

    <!-- 🔥 ORDER SUMMARY -->
    <div class="card mb-4 shadow" style="border-radius:15px;">
        <div class="card-body">

            <div class="row">

                <!-- DATE -->
                <div class="col-md-4">
                    <strong>Date:</strong><br>
                    <?= date('d M Y, H:i', strtotime($order->created)) ?>
                </div>

                <!-- 🔥 STATUS (FIXED) -->
                <div class="col-md-4">
                    <strong>Status:</strong><br>

                    <?php
                    // 🔥 FIX: normalize value
                    $status = strtolower(trim($order->status ?? 'pending'));

                    $statusClass = 'secondary';
                    $statusIcon = 'fa-clock';

                    if ($status === 'pending') {
                        $statusClass = 'warning';
                        $statusIcon = 'fa-hourglass-half';
                    } elseif ($status === 'completed') {
                        $statusClass = 'success'; // 🟢 HIJAU
                        $statusIcon = 'fa-check-circle';
                    } elseif ($status === 'cancelled') {
                        $statusClass = 'danger';
                        $statusIcon = 'fa-times-circle';
                    }
                    ?>

                    <span class="badge bg-<?= $statusClass ?> px-3 py-2" style="font-size:14px;">
                        <i class="fa <?= $statusIcon ?> me-1"></i>
                        <?= ucfirst($status) ?>
                    </span>

                </div>

                <!-- TOTAL -->
                <div class="col-md-4 text-end">
                    <strong>Total:</strong><br>
                    <span class="text-success fw-bold fs-5">
                        RM <?= number_format($order->total, 2) ?>
                    </span>
                </div>

            </div>

        </div>
    </div>

    <!-- 🔥 PRODUCT LIST -->
    <div class="card shadow" style="border-radius:15px;">

        <div class="card-header">
            <strong>Items</strong>
        </div>

        <div class="card-body">

            <?php foreach ($order->order_items as $item): ?>
            <div class="row align-items-center mb-3 pb-3 border-bottom">

                <!-- IMAGE -->
                <div class="col-md-2 text-center">
                    <img src="<?= $this->Url->image('products/product' . $item->product->id . '.png') ?>"
                         style="height:80px; object-fit:contain;">
                </div>

                <!-- NAME -->
                <div class="col-md-4">
                    <?= h($item->product->name) ?>
                </div>

                <!-- PRICE -->
                <div class="col-md-2 text-muted">
                    RM <?= number_format($item->price, 2) ?>
                </div>

                <!-- QTY -->
                <div class="col-md-2">
                    Qty: <?= $item->quantity ?>
                </div>

                <!-- SUBTOTAL -->
                <div class="col-md-2 text-success fw-bold">
                    RM <?= number_format($item->price * $item->quantity, 2) ?>
                </div>

            </div>
            <?php endforeach; ?>

        </div>

    </div>

    <!-- 🔙 BACK BUTTON -->
    <div class="mt-4">
        <?= $this->Html->link(
            'Back to Orders',
            ['action' => 'index'],
            ['class' => 'btn btn-light']
        ) ?>
    </div>

</div>