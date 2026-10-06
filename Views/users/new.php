<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
    <h1>New User</h1>
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

    <form action="<?= site_url('users/create') ?>" method="post">
        <?= csrf_field() ?>
        <label for="username">Username <span class="required">*</span></label>
        <input id="username" type="text" name="username" value="<?= esc(old('username')) ?>" required>

        <label for="full_name">Full Name <span class="required">*</span></label>
        <input id="full_name" type="text" name="full_name" value="<?= esc(old('full_name')) ?>" required>

        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="<?= esc(old('email')) ?>">

        <button class="button" type="submit">Create User</button>
        <a class="button secondary" href="<?= site_url('users') ?>">Cancel</a>
    </form>
<?= $this->endSection() ?>
