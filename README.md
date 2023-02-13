# larablog

## commands to run before use

### AUTOMATIC

run `clean.bat`, so it automatically runs the needed commands.

### MANUAL

Copy `env.example` and rename it to `.env`

Run `composer install` and `npm install`.

`npm run build` or optionally `npm run dev` with vite, or `npm run watch` with mix

`php artisan migrate:fresh` to get the database up and running. use the `--seed` argument to seed the database with posts, tags and fill their pivot table.

If things seem off, try running the `php artisan cache:clear` and `php artisan optimize:clear` commands.

Generate new key with `php artisan key:generate`

You could also use `CTRL + F5` to refresh the browser.

### Tasks - MVP

- [x] Post migration and model
- [x] Tag migration and model
- [x] Post controller
- [x] Tag controller
- [x] Populate DB with faker, factories and seeders
- [x] Post BREAD
- [x] Tag BREAD
- [x] blade templates
- [x] Create posts
  - [x] base form
  - [x] validation
  - [x] select2
  - [x] WYSIWYG editor: markdown editor
  - [x] error messages & old data
- [x] Items to components
- [x] Search
  - [x] in posts
  - [x] in tags
  - [x] Pagination
- [x] Admin
  - [x] edit posts
  - [x] delete posts
  - [x] modals (dialog+js, later sweetalert maybe?)
- [x] Tests (some basic tests)
- [x] image upload & delete
### POST MVP

- [x] SweetAlert2
- [ ] comment the hell out of it
- [ ] clean-up

### OPTIONAL

- [x] css&js upgrade
- [x] add livewire (doesn't really have a purpose rn)
