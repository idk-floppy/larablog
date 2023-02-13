# larablog

## commands to run before use

### AUTOMATIC

run `clean.bat`, so it automatically runs the needed commands.

### MANUAL

Copy `env.example` and rename it to `.env`

run (in order):
1. composer install
2. npm install
3. php artisan cache:clear
4. php artisan key:generate
5. php artisan route:clear
6. php artisan migrate:fresh
7. php artisan storage:link

then:
1. npm run dev / npm run build
2. php artisan serve


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
