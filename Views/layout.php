<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Tasks for Today') ?></title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.5; margin: 0; background: #f5f7fb; color: #1f2937; }
        nav { background: #1d4ed8; padding: 1rem; }
        nav a { color: #fff; margin-right: 1rem; text-decoration: none; font-weight: bold; }
        main { max-width: 850px; margin: 2rem auto; background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 10px #0001; }
        table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
        th, td { border: 1px solid #d1d5db; padding: .7rem; text-align: left; }
        th { background: #eff6ff; }
        .empty { padding: 1rem; background: #fef3c7; border-radius: 4px; }
        .profile dt { font-weight: bold; margin-top: 1rem; }
        .profile dd { margin-left: 0; }
        .page-header { display: flex; justify-content: space-between; align-items: center; gap: 1rem; }
        .button { display: inline-block; padding: .65rem 1rem; border: 0; border-radius: 5px; background: #1d4ed8; color: #fff; text-decoration: none; cursor: pointer; }
        .button.secondary { background: #6b7280; }
        form { max-width: 600px; }
        label { display: block; margin-top: 1rem; font-weight: bold; }
        input[type="text"], input[type="email"], input[type="file"] { width: 100%; box-sizing: border-box; padding: .65rem; margin-top: .35rem; border: 1px solid #9ca3af; border-radius: 4px; }
        form .button { margin-top: 1.25rem; }
        .required { color: #b91c1c; }
        .errors { padding: 1rem; margin: 1rem 0; background: #fee2e2; border-radius: 4px; }
        .success { padding: 1rem; background: #dcfce7; border-radius: 4px; }
        small { display: block; margin-top: .35rem; color: #4b5563; }
        .avatar { width: 80px; height: 80px; object-fit: cover; border-radius: 50%; display: block; }
        .avatar.large { width: 150px; height: 150px; }
        .current-avatar { margin-top: 1rem; }
    </style>
</head>
<body>
    <nav>
        <a href="<?= site_url('/') ?>">Today</a>
        <a href="<?= site_url('tasks') ?>">Task List</a>
        <a href="<?= site_url('profile') ?>">Profile</a>
        <a href="<?= site_url('customers') ?>">Customers</a>
        <a href="<?= site_url('users') ?>">Users</a>
        <a href="<?= site_url('about') ?>">About</a>
        <?php if (session()->get('isLoggedIn')): ?>
            <span style="color:#fff; margin-left:1rem;">Logged in as <?= esc(session()->get('username')) ?></span>
            <a href="<?= site_url('logout') ?>">Logout</a>
        <?php else: ?>
            <a href="<?= site_url('login') ?>">Login</a>
        <?php endif ?>
    </nav>
    <main>
        <?= $this->renderSection('content') ?>
    </main>
</body>
</html>
