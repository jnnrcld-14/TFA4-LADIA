<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
    <h1>Edit User</h1>
    <?php if ($errors = session()->getFlashdata('errors')): ?>
    <div class="errors">
        <strong>Please correct the following:</strong>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>

    <form action="<?= site_url('users/update/' . $user['id']) ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <label for="username">Username <span class="required">*</span></label>
        <input id="username" type="text" name="username" value="<?= esc(old('username', $user['username'])) ?>" required>

        <label for="full_name">Full Name <span class="required">*</span></label>
        <input id="full_name" type="text" name="full_name" value="<?= esc(old('full_name', $user['full_name'])) ?>" required>

        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="<?= esc(old('email', $user['email'])) ?>">

        <label for="password">New Password</label>
        <input id="password" type="password" name="password" minlength="8">
        <small>Leave blank to keep the current password. Minimum 8 characters when changing it.</small>

        <label for="avatar">Profile Picture</label>
        <input id="avatar" type="file" name="avatar" accept=".jpg,.jpeg,.png">
        <small>JPG or PNG only; maximum 2MB. The uploaded image is prepared as a 150 × 150 thumbnail.</small>

        <div class="current-avatar">
            <p>Current display image:</p>
            <?php
            $avatar = !empty($user['avatar'])
                ? base_url('uploads/avatars/' . $user['avatar'])
                : base_url('images/avatar-placeholder.png');
            ?>
            <img class="avatar large" src="<?= esc($avatar) ?>" alt="Current avatar">
        </div>

        <button class="button" type="submit">Update User</button>
        <a class="button secondary" href="<?= site_url('users') ?>">Cancel</a>
    </form>
<?= $this->endSection() ?>
