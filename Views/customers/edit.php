<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
    <h1>Edit Customer</h1>
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

    <form action="<?= site_url('customers/update/' . $customer['id']) ?>" method="post">
        <?= csrf_field() ?>
        <label for="full_name">Full Name <span class="required">*</span></label>
        <input id="full_name" type="text" name="full_name" value="<?= esc(old('full_name', $customer['full_name'])) ?>" required>

        <label for="email">Email <span class="required">*</span></label>
        <input id="email" type="email" name="email" value="<?= esc(old('email', $customer['email'])) ?>" required>

        <button class="button" type="submit">Update Customer</button>
        <a class="button secondary" href="<?= site_url('customers') ?>">Cancel</a>
    </form>
<?= $this->endSection() ?>
