# Coding challenge

Backend: Laravel 8
Frontend: Vue 2

## How to start project

If you are using Docker.io, follow these steps to run project on your local machine
```
git clone https://github.com/bjeftic/dynamic-form-design-system.git 
create .env file and copy all from .env.example
composer install
npm install
npm run dev

```
Starting Laravel Sail

```
./vendor/bin/sail up
$ vendor/bin/sail artisan migrate
$ vendor/bin/sail artisan db:seed
```

If you have problems with permission for logs in storage folder, please run this command in container:
```
$ sudo chmod -R 777 storage
```
