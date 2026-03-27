
Copy

# DevFolio 
 
A platform where developers can automatically generate and share a professional portfolio website — no design skills required.
 
---
 
## About
 
DevFolio lets developers sign up, fill in their profile, add projects and skills, and get a shareable public portfolio page instantly. Built with Laravel 12 as a learning project.
 
---
 
## Features
 
- 🔐 Auth — register, login with email or username
- 👤 Profile editor — name, bio, title, location, avatar upload, CV upload, social links
- 🗂 Projects — add projects with tags, GitHub link, live link, and draft/published status
- 🧠 Skills — add skills with proficiency level and category, prevent duplicates
- 📊 Dashboard — stats overview (projects, skills, experience)
- 🌐 Public portfolio page — shareable link for each user
- 🛡 Auth middleware — protected routes for logged-in users only
 
---
 
## Tech Stack
 
| Layer | Technology |
|---|---|
| Backend | Laravel 12 (PHP 8.2) |
| Frontend | Blade, Vanilla JS, CSS |
| Database | MySQL |
| Asset Bundling | Vite |
| Storage | Laravel Storage (public disk) |
 
---
 
## Installation
 
### Requirements
- PHP 8.2+
- Composer
- Node.js & npm
- MySQL
 
### Steps
 
```bash
# 1. Clone the repo
git clone https://github.com/Kabeer6568/Devfolio.git
cd Devfolio
 
# 2. Install PHP dependencies
composer install
 
# 3. Install JS dependencies
npm install
 
# 4. Copy environment file
cp .env.example .env
 
# 5. Generate app key
php artisan key:generate
 
# 6. Configure your database in .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=devfolio
DB_USERNAME=root
DB_PASSWORD=
 
# 7. Run migrations
php artisan migrate
 
# 8. Link storage
php artisan storage:link
 
# 9. Start dev servers
php artisan serve
npm run dev
```
 
Then visit `http://127.0.0.1:8000`
 
---
 
## Project Structure
 
```
app/
├── Http/
│   └── Controllers/
│       ├── AuthController.php      # register, login, dashboard, edit profile
│       ├── SkillController.php     # add, delete skills
│       └── ProjectController.php  # add, delete projects
├── Models/
│   ├── User.php
│   ├── Skill.php
│   └── Projects.php
resources/
├── views/
│   └── layouts/
│       ├── app.blade.php           # main layout
│       ├── index.blade.php         # home page
│       ├── register.blade.php
│       ├── login.blade.php
│       └── admin/
│           ├── dashboard.blade.php
│           ├── edit-profile.blade.php
│           ├── skills.blade.php
│           └── projects.blade.php
│   └── partials/
│       └── navbar.blade.php        # dynamic navbar per page
routes/
└── web.php
```
 
---
 
## Routes
 
| Method | URL | Description |
|---|---|---|
| GET | `/` | Home page |
| GET | `/{type}` | Login or Register page |
| POST | `/register` | Register user |
| POST | `/login` | Login user |
| GET | `/dashboard` | Dashboard (auth) |
| GET | `/edit-profile` | Edit profile page (auth) |
| POST | `/edit-profile` | Save profile (auth) |
| GET | `/skills` | Skills page (auth) |
| POST | `/skills` | Add skill (auth) |
| DELETE | `/skills/{id}` | Delete skill (auth) |
| GET | `/projects` | Projects page (auth) |
| POST | `/projects` | Add project (auth) |
| DELETE | `/projects/{id}` | Delete project (auth) |
 
---
 
## Environment Variables
 
```env
APP_NAME=DevFolio
APP_URL=http://127.0.0.1:8000
 
DB_CONNECTION=mysql
DB_DATABASE=devfolio
DB_USERNAME=root
DB_PASSWORD=
 
FILESYSTEM_DISK=public
```
 
---
 
## Screenshots
 
> Coming soon
 
---
 
## What I Learned
 
This was my first full-stack Laravel project. Key things learned:
 
- Laravel routing, middleware, and named routes
- Eloquent ORM — relationships, mass assignment, casting
- File uploads with Laravel Storage
- Blade templating — layouts, partials, components
- Form validation and flash messages
- Vanilla JS interacting with Laravel forms
- Debugging `e.preventDefault()` conflicts between JS and Laravel
 
---
 
## Known Limitations
 
- No email verification
- Public portfolio page not fully implemented yet
- No pagination on skills/projects
- No image optimization for avatar uploads
 
---
 
## Author
 
**Kabeer** — [@Kabeer6568](https://github.com/Kabeer6568)
 
---
 
## License
 
MIT