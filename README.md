<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Web Blog App

> Laravel Web Blog sample App.

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

### The News API imports
The External news API data is imported after every 1 minutes. In ideal production development, this should be 3,4 hours as described in order to have latest news.

The news are queued and run when the server is free to do so.

To run the scheduler locally;

` php artisan schedule:work
`

Then, run the queues;

`php artisan queue:work` or `php artisan queue:listen`


## Docker
In case you don't have local set up
### Set up
- Make sure you have docker installed
- Assumes you have your .env file - in case you're using automated CD/CD -  you can add step to create .env from .env.example and adding values,
- Take NOTE of `DB_HOST` value

database env vars - for demo purposes inside docker, update .env as;
```dotenv
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=web_blogging_platform
DB_USERNAME=root
DB_PASSWORD=password

CACHE_DRIVER=redis
SESSION_DRIVER=redis
QUEUE_DRIVER=redis
REDIS_HOST=redis
```

### Start docker
`docker-compose up -d`

Migrations(in Dockerfile) and Seeders(mandatory to set up roles)

run migrations(optional)

`docker-compose exec app php artisan migrate`

seed data to set up roles

`docker-compose exec app php artisan db:seed`

NOTE: The `start.sh` file takes care of schedulers and queued jobs that auto imports the Eternal Posts from API.

Ideally, the `60s` interval is for demo purposes, in normal running of the App, 3/4 hts interval makes much sense

You can also run more commands via

`docker-compose exec app [command here]`

access you app via link;

`http:your_ip:8000` or `localhost:8000`

[Extra] - to force  create images

`docker-compose up -d --force-recreate --no-deps --build`

## Running Tests

`php artisan run test`

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
