<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
    <div class="page-header">
        <div>
            <h1>Customer Accounts</h1>
            <p>Create and edit customer records.</p>
        </div>
        <a class="button" href="<?= site_url('customers/new') ?>">+ New Customer</a>
    </div>

    <?php if ($message = session()->getFlashdata('success')): ?>
        <p class="success"><?= esc($message) ?></p>
    <?php endif ?>

    <?php if (empty($customers)): ?>
        <p class="empty">No customer records found.</p>
    <?php else: ?>
        <table>
            <thead><tr><th>Full Name</th><th>Email</th><th>Action</th></tr></thead>
            <tbody>
            <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?= esc($customer['full_name']) ?></td>
                    <td><?= esc($customer['email']) ?></td>
                    <td><a href="<?= site_url('customers/edit/' . $customer['id']) ?>">Edit</a></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    <?php endif ?>
<?= $this->endSection() ?>
