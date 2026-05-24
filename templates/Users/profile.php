<div class="container mt-4">

    <h2>My Profile</h2>

    <div class="card p-4">

        <p><strong>Username:</strong> <?= h($userData->username) ?></p>
        <p><strong>Email:</strong> <?= h($userData->email) ?></p>
        <p><strong>Phone:</strong> <?= h($userData->phone) ?></p>

        <!-- 🔥 PASSWORD HIDE -->
        <p><strong>Password:</strong> ******</p>

        <?= $this->Html->link(
            'Edit Profile',
            ['action' => 'editProfile'],
            ['class' => 'btn btn-primary mt-3']
        ) ?>

    </div>

</div>