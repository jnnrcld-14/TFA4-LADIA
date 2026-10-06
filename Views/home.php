<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
    <h1>Tasks for Today</h1>
    <p><?= esc(date('F j, Y', strtotime($today))) ?></p>
    <?php if (empty($tasks)): ?>
        <p class="empty">There are no tasks scheduled for today.</p>
    <?php else: ?>
        <table>
            <thead><tr><th>Task</th><th>Status</th></tr></thead>
            <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr><td><?= esc($task['title']) ?></td><td><?= esc(ucwords($task['status'])) ?></td></tr>
            <?php endforeach ?>
            </tbody>
        </table>
    <?php endif ?>
<?= $this->endSection() ?>
