<div class="container mt-4">

    <h2>Edit Profile</h2>

    <?= $this->Form->create($userData) ?>

    <div class="mb-3">
        <?= $this->Form->control('username', ['class' => 'form-control']) ?>
    </div>

    <div class="mb-3">
        <?= $this->Form->control('email', ['class' => 'form-control']) ?>
    </div>

    <div class="mb-3">
        <?= $this->Form->control('phone', ['class' => 'form-control']) ?>
    </div>

    <div class="mb-3">
    <?= $this->Form->control('password', [
        'type' => 'password',
        'class' => 'form-control',
        'required' => false,
        'value' => '', // 🔥 IMPORTANT (kosongkan field)
        'label' => 'New Password (optional)'
    ]) ?>
    </div>

    <button class="btn btn-success">Update</button>

    <?= $this->Html->link(
        'Cancel',
        ['action' => 'profile'],
        ['class' => 'btn btn-secondary ms-2']
    ) ?>

    <?= $this->Form->end() ?>

</div>