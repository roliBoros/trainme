# trainme

Social website for hiring personal trainers by their current location.

## Requirements

- PHP 7.4+ (with the `pdo_sqlite` extension, enabled by default)

No database server is needed: the app uses a SQLite database which is
created automatically at `trainme/data/trainme.db` on first use.

## Run it

```sh
php -S localhost:8000 -t trainme
```

Then open http://localhost:8000 in your browser, sign up with an email
and password, pick Trainer or Trainee, and hit Go.

## Using MySQL instead (optional)

Set these environment variables before starting the server:

```sh
export DB_DSN="mysql:host=localhost;dbname=trainme;charset=utf8mb4"
export DB_USER="your_user"
export DB_PASS="your_password"
```

The `users` table is created automatically if it does not exist.
