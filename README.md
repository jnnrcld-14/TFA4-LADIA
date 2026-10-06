# TFA2 POS / Account Management Extension

This submission extends the supplied CodeIgniter 4 TFA2 project with customer and user account management and prepared user avatars.

## Features

- `/` shows only tasks scheduled for today's date.
- `/tasks` shows all tasks ordered by date.
- `/profile` shows the single demo user.
- `/about` is a static developer page.
- `/customers` lists customer accounts.
- `/customers/new` creates a customer after validating full name and email.
- `/customers/edit/{id}` pre-fills and updates a customer.
- `/users` lists user accounts and displays a prepared avatar or placeholder.
- `/users/new` creates a user and validates a unique username and required full name.
- `/users/edit/{id}` pre-fills and updates a user.
- User avatar upload accepts JPG/JPEG/PNG files up to 2MB.
- Uploaded avatars are prepared as 150x150 thumbnails and stored in `public/uploads/avatars/`.
- Only the prepared avatar filename is stored in `users.avatar`.

## Setup

This archive contains the application files from the supplied TFA2 project. As with the original submission, place the `app/` folder into a CodeIgniter 4 project.

1. Create a MySQL database, for example `tasks_today`.
2. Configure `.env`:

```ini
database.default.hostname = localhost
database.default.database = tasks_today
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
```

3. Run:

```bash
php spark migrate
php spark db:seed DemoDataSeeder
```

The seed creates eight tasks across multiple dates and exactly one demo user, plus two demo customer records.

4. Start the server:

```bash
php spark serve
```

5. Visit the routes listed above.

## Avatar requirements

The user edit form uses `multipart/form-data`. Avatar validation checks:

- actual image content
- JPG/JPEG/PNG MIME type
- maximum 2048 KB (2 MB)

The image is resized/cropped to 150x150 using CodeIgniter's image service. The final prepared file remains in the public uploads folder and only its filename is stored in the database.

Make sure the PHP image extension required by your configured CodeIgniter image driver is enabled.

## Important

`php spark migrate:fresh --seed` resets the database and is useful for a clean demonstration, but it deletes existing database data. Use it only when a reset is intended.


## Authentication added for TFA3

- Login: `/login`
- Logout: `/logout`
- Customer Accounts and User Accounts are protected by the `auth` filter.
- Existing users receive the temporary password `password` when the authentication migration runs. Change it after logging in.
- New users must have a password of at least 8 characters.
- Editing a user leaves the existing password unchanged when the password field is blank.
- Passwords are stored using `password_hash()` and checked using `password_verify()`.

### Test checklist

1. Log out and visit `/customers` -> redirected to `/login`.
2. Log out and visit `/customers/new` -> redirected to `/login`.
3. Log out and visit `/customers/edit/1` -> redirected to `/login` (if record 1 exists).
4. Log out and visit `/users` -> redirected to `/login`.
5. Log out and visit `/users/new` -> redirected to `/login`.
6. Log out and visit `/users/edit/1` -> redirected to `/login` (if record 1 exists).
7. Log in as `demo_user` with the temporary password `password`.
8. Visit `/customers` and `/users` -> pages should load normally.
9. Visit `/logout`, then confirm protected pages redirect to `/login` again.
