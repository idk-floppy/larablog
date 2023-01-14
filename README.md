# larablog

commands to run before using the app

AUTOMATIC: run `run.bat`, so it automatically runs the needed commands.

MANUAL:
Copy `env.example` and renamte it to `.env`

Run `composer install` and `npm install`.

`npm run build` or optionally `npm run dev` with vite, or `npm run watch` with mix

`php artisan migrate:fresh` to get the database up and running. use the `--seed` argument to seed the database with posts and tags.

If things seem off, try running the `php artisan cache:clear` command to clear the cache.

Generate new secret key with `php artisan key:generate`

You could also use `CTRL + F5` to refresh the browser.
