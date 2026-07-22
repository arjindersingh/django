# Django in PHP

This repository contains a lightweight PHP MVC framework inspired by Django-style architecture.

## Structure
- project/: the main project package with settings, URLs, core modules, and project-level controllers
- project/core/: project-level Django-style core package
- project/controllers/: project-level controller layer
- project/settings.php: project configuration registry
- project/urls.php: project-level URL registry
- apps/: individual application directories
- apps/<app>/urls.php: app-level URL registration
- apps/<app>/templates/<app>/: app-specific templates, following the common Django convention
- public/: web entrypoint

## Run locally
```bash
cd /workspaces/django
php -S 127.0.0.1:8000 -t public
```

Then open:
- http://127.0.0.1:8000/
- http://127.0.0.1:8000/posts/1
- http://127.0.0.1:8000/blog

## Add a new app
1. Create a new folder under apps/.
2. Add files such as views.php, urls.php, and models.php.
3. Place templates in apps/<app>/templates/<app>/.
4. Register routes from urls.php so they are discovered automatically.
