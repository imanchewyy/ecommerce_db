<?php
$cakeDescription = 'My E-Commerce';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>

    <?= $this->Html->meta('icon') ?>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

<style>

/* 🔥 BACKGROUND */
body {
    background: linear-gradient(135deg, #ff512f, #dd2476, #6a11cb);
    background-size: 300% 300%;
    animation: gradientMove 10s ease infinite;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    font-family: 'Segoe UI', sans-serif;
}

@keyframes gradientMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* 🔥 NAVBAR */
.navbar {
    background: rgba(0,0,0,0.35) !important;
    backdrop-filter: blur(15px);
    border-bottom: 1px solid rgba(255,255,255,0.2);
    box-shadow: 0 0 20px rgba(0,0,0,0.4);
}

.navbar-brand {
    font-weight: bold;
    color: white !important;
}

.nav-link {
    color: rgba(255,255,255,0.85) !important;
}

.nav-link:hover {
    color: #fff !important;
    text-shadow: 0 0 10px rgba(255,255,255,0.7);
}

/* BUTTON */
.navbar .btn {
    border-radius: 20px;
    font-weight: bold;
}

.btn-light {
    background: linear-gradient(45deg,#36d1dc,#5b86e5);
    border: none;
    color: white;
}

.btn-success {
    background: linear-gradient(45deg,#ff512f,#dd2476);
    border: none;
}

/* 🔥 TOAST NOTIFICATION */
#toast-container {
    position: fixed;
    top: 30px;
    right: 30px;
    z-index: 99999;
}

.toast-msg {
    color: #fff;
    padding: 18px 25px;
    border-radius: 15px;
    margin-bottom: 12px;
    font-weight: bold;

    box-shadow: 0 0 25px rgba(0,0,0,0.5);

    display: flex;
    align-items: center;
    gap: 10px;

    animation: slideIn 0.5s ease, floatUp 3s ease forwards;
}

/* ICON SIZE */
.toast-msg {
    background: linear-gradient(135deg,#00ffcc,#00c3ff);
    color: #000;

    padding: 18px 25px;
    border-radius: 15px;
    margin-bottom: 10px;

    font-weight: bold;
    font-size: 14px;

    display: flex;
    align-items: center;
    gap: 10px;

    box-shadow: 0 0 25px rgba(0,255,200,0.8);

    animation: slideIn 0.5s ease, fadeOut 3s forwards;
}

.toast-msg i {
    font-size: 18px;
}

/* MASUK */
@keyframes slideIn {
    from {
        transform: translateX(120px);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

/* HILANG */
@keyframes fadeOut {
    0% { opacity: 1; }
    80% { opacity: 1; }
    100% {
        opacity: 0;
        transform: translateY(-20px);
    }
}

/* CONTENT */
.main-content {
    flex: 1;
}

footer {
    background: #212529;
}

</style>

</head>

<body>

<?php
$session = $this->request->getSession();
$user = $session->read('Auth');
?>

<!-- 🔥 NAVBAR -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">

        <?= $this->Html->link(
            'My E-Commerce',
            ['controller' => $user ? 'Dashboard' : 'Pages', 'action' => $user ? 'index' : 'display', $user ? null : 'home'],
            ['class' => 'navbar-brand']
        ) ?>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav me-auto">
                <?php if ($user): ?>
                    <li class="nav-item"><?= $this->Html->link('Dashboard', ['controller'=>'Dashboard','action'=>'index'], ['class'=>'nav-link']) ?></li>
                    <li class="nav-item"><?= $this->Html->link('Products', ['controller'=>'Products','action'=>'index'], ['class'=>'nav-link']) ?></li>
                    <li class="nav-item"><?= $this->Html->link('Cart', ['controller'=>'OrderItems','action'=>'index'], ['class'=>'nav-link']) ?></li>
                    <li class="nav-item"><?= $this->Html->link('Orders', ['controller'=>'Orders','action'=>'index'], ['class'=>'nav-link']) ?></li>
                <?php endif; ?>
            </ul>

            <div class="d-flex align-items-center">

                <?php if ($user): ?>

                    <span class="text-white me-3">
                        Welcome, <?= h($user->username) ?>
                    </span>

                    <?= $this->Html->link('<i class="fa fa-user"></i> Profile',
                        ['controller'=>'Users','action'=>'profile'],
                        ['class'=>'btn btn-light me-2','escape'=>false]) ?>

                    <?= $this->Form->postLink('<i class="fa fa-sign-out-alt"></i> Logout',
                        ['controller'=>'Users','action'=>'logout'],
                        ['class'=>'btn btn-danger','escape'=>false]) ?>

                <?php else: ?>

                    <?= $this->Html->link('Login',['controller'=>'Users','action'=>'login'],['class'=>'btn btn-light me-2']) ?>
                    <?= $this->Html->link('Sign Up',['controller'=>'Users','action'=>'register'],['class'=>'btn btn-success']) ?>

                <?php endif; ?>

            </div>

        </div>
    </div>
</nav>

<!-- 🔥 NOTIFICATION (SUPER POPUP) -->
<div id="toast-container">

<?php
$flash = $this->Flash->render();

if ($flash):
?>
    <div class="toast-msg">
        <i class="fa fa-check-circle"></i>
        <span><?= strip_tags($flash) ?></span>
    </div>
<?php endif; ?>

</div>

<!-- 🔥 CONTENT -->
<div class="container mt-4 main-content">
    <?= $this->fetch('content') ?>
</div>

<!-- FOOTER -->
<footer class="text-white text-center p-3">
    <p class="mb-0">© <?= date('Y') ?> My E-Commerce System</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
// AUTO HIDE NOTIFICATION
setTimeout(() => {
    document.querySelectorAll('.toast-msg').forEach(el => {
        el.style.opacity = '0';
        setTimeout(() => el.remove(), 500);
    });
}, 3000);
</script>

</body>
</html>