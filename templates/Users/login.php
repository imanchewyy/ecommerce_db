<div class="container d-flex justify-content-center align-items-center" style="min-height:80vh;">

    <div class="login-card p-4">

        <h2 class="text-center mb-4 text-white fw-bold">
            🔐 Login Account
        </h2>

        <?= $this->Flash->render() ?>

        <?= $this->Form->create() ?>

        <!-- USERNAME -->
        <div class="mb-3">
            <?= $this->Form->control('username', [
                'class' => 'form-control custom-input',
                'label' => 'Username',
                'required' => true
            ]) ?>
        </div>

        <!-- PASSWORD -->
        <div class="mb-3">
            <?= $this->Form->control('password', [
                'type' => 'password',
                'class' => 'form-control custom-input',
                'label' => 'Password',
                'required' => true
            ]) ?>
        </div>

        <!-- BUTTON -->
        <div class="d-grid">
            <button class="btn btn-login">🚀 Login Now</button>
        </div>

        <?= $this->Form->end() ?>

        <!-- SIGN UP LINK -->
        <p class="mt-4 text-center text-white">
            Belum ada account?
            <?= $this->Html->link(
                'Sign Up',
                ['controller' => 'Users', 'action' => 'register'],
                ['class' => 'fw-bold text-warning']
            ) ?>
        </p>

    </div>

</div>