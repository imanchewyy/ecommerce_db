<div class="container mt-5">

    <!-- 🔥 TITLE -->
    <h2 class="mb-4 text-center fw-bold text-white glow-text">
        🚀 Dashboard Overview
    </h2>

    <!-- 🔥 SUMMARY CARDS -->
    <div class="row text-center mb-5">

        <!-- PRODUCTS -->
        <div class="col-md-4 mb-4">
            <div class="card dashboard-card p-4 bg-blue">
                <h5>Total Products</h5>
                <h1 class="fw-bold"><?= $totalProducts ?></h1>
                <small>Available in store</small>
            </div>
        </div>

        <!-- ORDERS -->
        <div class="col-md-4 mb-4">
            <div class="card dashboard-card p-4 bg-pink">
                <h5>Total Orders</h5>
                <h1 class="fw-bold"><?= $totalOrders ?></h1>
                <small>Customer purchases</small>
            </div>
        </div>

        <!-- 🔥 NEW: CATEGORIES -->
        <div class="col-md-4 mb-4">
            <div class="card dashboard-card p-4 bg-green">
                <h5>Total Categories</h5>
                <h1 class="fw-bold"><?= $totalCategories ?></h1>
                <small>Product groups</small>
            </div>
        </div>

    </div>

    <!-- 🔥 ACTION CARDS -->
    <div class="row justify-content-center mb-5">

        <div class="col-md-4 mb-4">
            <a href="<?= $this->Url->build(['controller'=>'Products','action'=>'index']) ?>" class="action-link">
                <div class="action-card text-center p-4">
                    <div class="icon mb-3">📦</div>
                    <h5>Manage Products</h5>
                    <p>Update & organize your store items</p>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-4">
            <a href="<?= $this->Url->build(['controller'=>'Orders','action'=>'index']) ?>" class="action-link">
                <div class="action-card text-center p-4">
                    <div class="icon mb-3">🛒</div>
                    <h5>View Orders</h5>
                    <p>Track customer purchases easily</p>
                </div>
            </a>
        </div>

    </div>

    <!-- 🔥 CHARTS -->
    <div class="row">

        <!-- BAR CHART -->
        <div class="col-md-6 mb-4">
            <div class="card p-4 dashboard-card">
                <h5 class="text-center mb-3">📈 System Overview</h5>
                <canvas id="barChart"></canvas>
            </div>
        </div>

        <!-- PIE CHART -->
        <div class="col-md-6 mb-4">
            <div class="card p-4 dashboard-card">
                <h5 class="text-center mb-3">🥧 Category Distribution</h5>
                <canvas id="pieChart"></canvas>
            </div>
        </div>

    </div>

</div>

<!-- 🔥 STYLE -->
<style>

.action-link {
    text-decoration: none !important;
    color: inherit !important;
}

.glow-text {
    text-shadow: 0 0 10px rgba(255,255,255,0.7),
                 0 0 20px rgba(255,255,255,0.5);
}

.dashboard-card {
    border-radius: 20px;
    color: white;
    transition: 0.3s;
    backdrop-filter: blur(10px);
}

.dashboard-card:hover {
    transform: translateY(-10px) scale(1.05);
    box-shadow: 0 0 30px rgba(255,255,255,0.4);
}

.bg-blue {
    background: linear-gradient(135deg,#36d1dc,#5b86e5);
}

.bg-pink {
    background: linear-gradient(135deg,#ff512f,#dd2476);
}

.bg-green {
    background: linear-gradient(135deg,#00c9a7,#00b894);
}

.action-card {
    border-radius: 25px;
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(15px);
    color: white;
    border: 1px solid rgba(255,255,255,0.2);
    transition: all 0.3s ease;
}

.action-card .icon {
    font-size: 40px;
}

.action-card:hover {
    transform: translateY(-12px) scale(1.05);
    box-shadow: 0 0 35px rgba(255,255,255,0.5);
}

@keyframes floatBubble {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-6px); }
    100% { transform: translateY(0px); }
}

.action-card {
    animation: floatBubble 4s ease-in-out infinite;
}

</style>

<!-- 🔥 CHART -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

<script>

Chart.register(ChartDataLabels);

// 🔥 BAR CHART (NO REVENUE)
new Chart(document.getElementById('barChart'), {
    type: 'bar',
    data: {
        labels: ['Products', 'Orders'],
        datasets: [{
            label: 'System Overview',
            data: [
                <?= $totalProducts ?>,
                <?= $totalOrders ?>
            ],
            borderRadius: 12
        }]
    },
    options: {
        plugins: {
            datalabels: {
                color: 'white',
                anchor: 'end',
                align: 'top',
                font: { weight: 'bold' }
            }
        }
    }
});

// 🔥 PIE CHART
new Chart(document.getElementById('pieChart'), {
    type: 'pie',
    data: {
        labels: <?= json_encode($categoryNames ?? ['Electronics','Accessories','Fitness','Fashion']) ?>,
        datasets: [{
            data: <?= json_encode($categoryCounts ?? [5,3,2,4]) ?>
        }]
    },
    options: {
        plugins: {
            datalabels: {
                color: 'white',
                formatter: (value) => value,
                font: { weight: 'bold' }
            }
        }
    }
});

</script>