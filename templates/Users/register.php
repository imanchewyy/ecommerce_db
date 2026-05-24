<div class="container d-flex justify-content-center align-items-center" style="min-height:80vh;">

    <div class="login-card p-4">

        <h2 class="text-center mb-4 text-white fw-bold">
            📝 Create Account
        </h2>

        <?= $this->Flash->render() ?>

        <?= $this->Form->create($user) ?>

        <div class="mb-3">
            <?= $this->Form->control('username', [
                'class' => 'form-control custom-input',
                'label' => 'Username'
            ]) ?>
        </div>

        <div class="mb-3">
            <?= $this->Form->control('email', [
                'class' => 'form-control custom-input',
                'label' => 'Email'
            ]) ?>
        </div>

        <div class="mb-3">
            <?= $this->Form->control('phone', [
                'class' => 'form-control custom-input',
                'label' => 'Phone Number'
            ]) ?>
        </div>

        <div class="mb-3">
            <?= $this->Form->control('password', [
                'type' => 'password',
                'class' => 'form-control custom-input',
                'label' => 'Password'
            ]) ?>
        </div>

        <div class="d-grid">
            <button class="btn btn-register">🔥 Create Account</button>
        </div>

        <?= $this->Form->end() ?>

        <p class="mt-4 text-center text-white">
            Dah ada account?
            <?= $this->Html->link(
                'Login',
                ['controller' => 'Users', 'action' => 'login'],
                ['class' => 'fw-bold text-warning']
            ) ?>
        </p>

    </div>

</div>