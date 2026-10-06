<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
    <div class="page-header">
        <div>
            <h1>User Accounts</h1>
            <p>Manage users and their prepared profile avatars.</p>
        </div>
        <a class="button" href="<?= site_url('users/new') ?>">+ New User</a>
    </div>

    <?php if ($message = session()->getFlashdata('success')): ?>
        <p class="success"><?= esc($message) ?></p>
    <?php endif ?>

    <?php if (empty($users)): ?>
        <p class="empty">No user records found.</p>
    <?php else: ?>
        <table>
            <thead><tr><th>Avatar</th><th>Username</th><th>Full Name</th><th>Email</th><th>Action</th></tr></thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td>
                        <?php
                        $avatar = !empty($user['avatar'])
                            ? base_url('uploads/avatars/' . $user['avatar'])
                            : base_url('images/avatar-placeholder.png');
                        ?>
                        <img class="avatar" src="<?= esc($avatar) ?>" alt="Avatar for <?= esc($user['full_name']) ?>">
                    </td>
                    <td><?= esc($user['username']) ?></td>
                    <td><?= esc($user['full_name']) ?></td>
                    <td><?= esc($user['email']) ?></td>
                    <td><a href="<?= site_url('users/edit/' . $user['id']) ?>">Edit</a></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    <?php endif ?>
<?= $this->endSection() ?>
