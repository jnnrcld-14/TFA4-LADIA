<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
    <h1>All Tasks</h1>
    <table>
        <thead><tr><th>Date</th><th>Task</th><th>Status</th></tr></thead>
        <tbody>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= esc(date('M j, Y', strtotime($task['task_date']))) ?></td>
                <td><?= esc($task['title']) ?></td>
                <td><?= esc(ucwords($task['status'])) ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
<?= $this->endSection() ?>
