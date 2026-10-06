<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - POS Application</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f7fb; color: #1f2937; margin: 0; }
        .login-card { max-width: 420px; margin: 8rem auto; background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 10px #0001; }
        h1 { margin-top: 0; }
        label { display: block; margin-top: 1rem; font-weight: bold; }
        input { width: 100%; box-sizing: border-box; padding: .65rem; margin-top: .35rem; border: 1px solid #9ca3af; border-radius: 4px; }
        button { width: 100%; padding: .7rem; margin-top: 1.25rem; border: 0; border-radius: 5px; background: #1d4ed8; color: #fff; cursor: pointer; font-weight: bold; }
        .errors, .error, .success { padding: 1rem; margin: 1rem 0; border-radius: 4px; }
        .errors, .error { background: #fee2e2; }
        .success { background: #dcfce7; }
    </style>
</head>
<body>
    <main class="login-card">
        <h1>POS Login</h1>
        <p>Log in to manage customer and user accounts.</p>

        <?php if ($message = session()->getFlashdata('error')): ?>
            <div class="error"><?= esc($message) ?></div>
        <?php endif ?>

        <?php if ($message = session()->getFlashdata('success')): ?>
            <div class="success"><?= esc($message) ?></div>
        <?php endif ?>

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

        <form action="<?= site_url('login') ?>" method="post">
            <?= csrf_field() ?>
            <label for="username">Username</label>
            <input id="username" type="text" name="username" value="<?= esc(old('username')) ?>" required>

            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>

            <button type="submit">Log In</button>
        </form>
    </main>
</body>
</html>
