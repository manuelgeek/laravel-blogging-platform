<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## TODO App

Laravel and Vue 3 TODO App

### Set up

`composer install`

`php artisan key:generate`

`cp .env.example .env` Then add necessary env vars; DB, Mail etc

`QUEUE_CONNECTION=database`

`ADMIN_PASSWORD=somestring`

`npm install`

`npm run dev` build tailwindcss assets

`php artisan migrate --seed` The seeder sets up user roles, permissions and super Admin


### Local Development
This assumes you have required environment for Laravel development

`npm run watch` to watch assets changes

`php artisan serve`

### Or Start Docker instance
In case you don't have local set up

// TODO::

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
