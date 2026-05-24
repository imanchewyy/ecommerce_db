<div class="container text-center mt-5">

    <!-- 🔥 HERO -->
    <h1 class="fw-bold text-white mb-3 glow-text display-5">
        🚀 Discover the Future of Shopping
    </h1>

    <p class="text-light mb-4 fs-5">
        Premium Tech • Smart Deals • Next-Level Experience 🔥
    </p>

    <!-- 🔥 BUTTON -->
    <div class="mb-5">

        <?= $this->Html->link(
            'Enter Now',
            ['controller' => 'Users', 'action' => 'login'],
            ['class' => 'btn btn-lg btn-hero-login me-3']
        ) ?>

        <?= $this->Html->link(
            'Create an Account',
            ['controller' => 'Users', 'action' => 'register'],
            ['class' => 'btn btn-lg btn-hero-register']
        ) ?>

    </div>

    <!-- 🔥 BUBBLE FEATURES -->
    <div class="row justify-content-center">

        <div class="col-md-4 mb-4">
            <div class="bubble-card">

                <h4>📱 Next-Gen Gadgets</h4>
                <p>Explore cutting-edge technology built for the future</p>

            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="bubble-card">

                <h4>💎 Smart Pricing</h4>
                <p>Premium products with unbeatable value</p>

            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="bubble-card">

                <h4>⚡ Lightning Delivery</h4>
                <p>Fast, reliable and seamless shipping experience</p>

            </div>
        </div>

    </div>

</div>

<!-- 🔥 STYLE -->
<style>

/* 🔥 HERO TEXT GLOW */
.glow-text {
    text-shadow: 0 0 10px rgba(255,255,255,0.8),
                 0 0 20px rgba(255,255,255,0.6),
                 0 0 30px rgba(255,255,255,0.4);
}

/* 🔥 BUTTON LOGIN */
.btn-hero-login {
    background: linear-gradient(45deg,#36d1dc,#5b86e5);
    color: white;
    border-radius: 30px;
    padding: 12px 30px;
    font-weight: bold;
    transition: 0.3s;
}

.btn-hero-login:hover {
    transform: scale(1.1);
    box-shadow: 0 0 25px rgba(91,134,229,0.8);
}

/* 🔥 BUTTON REGISTER */
.btn-hero-register {
    background: linear-gradient(45deg,#ff512f,#dd2476);
    color: white;
    border-radius: 30px;
    padding: 12px 30px;
    font-weight: bold;
    transition: 0.3s;
}

.btn-hero-register:hover {
    transform: scale(1.1);
    box-shadow: 0 0 25px rgba(255,81,47,0.8);
}

/* 🔥 BUBBLE CARD */
.bubble-card {
    padding: 30px;
    border-radius: 25px;

    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(15px);

    box-shadow: 0 10px 30px rgba(0,0,0,0.3);

    color: white;

    transition: all 0.3s ease;
    cursor: pointer;
}

/* 🔥 FLOAT + GLOW */
.bubble-card:hover {
    transform: translateY(-12px) scale(1.05);
    box-shadow: 0 20px 50px rgba(255,255,255,0.3);
}

/* 🔥 TEXT STYLE */
.bubble-card h4 {
    font-weight: bold;
    margin-bottom: 10px;
}

.bubble-card p {
    opacity: 0.9;
}

/* 🔥 EXTRA: FLOATING ANIMATION */
@keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-8px); }
    100% { transform: translateY(0px); }
}

.bubble-card {
    animation: float 4s ease-in-out infinite;
}

</style>