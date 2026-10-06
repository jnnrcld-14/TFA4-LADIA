<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
    <h1>Demo User Profile</h1>
    <?php if ($user === null): ?>
        <p class="empty">No demo user record was found.</p>
    <?php else: ?>
        <dl class="profile">
            <dt>Username</dt><dd><?= esc($user['username']) ?></dd>
            <dt>Full name</dt><dd><?= esc($user['full_name']) ?></dd>
            <dt>Email</dt><dd><?= esc($user['email']) ?></dd>
            <dt>Member since</dt><dd><?= esc(date('F j, Y', strtotime($user['created_at']))) ?></dd>
        </dl>
    <?php endif ?>
<?= $this->endSection() ?>
