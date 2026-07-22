# Django in PHP

This repository contains a lightweight PHP MVC framework inspired by Django-style architecture.

## Structure
- project/: the main project package with settings, URLs, and core modules
- project/core/: project-level core package
- project/urls/: project URL configuration package
- apps/: individual application directories
- apps/<app>/urls/: app-level URL package
- apps/<app>/templates/<app>/: app-specific templates, following the common Django convention
- app/Core/: framework base classes
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
