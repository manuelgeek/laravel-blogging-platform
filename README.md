<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

[![Actions Status](https://github.com/manuelgeek/laravel-blogging-platform/workflows/Laravel/badge.svg)](https://github.com/manuelgeek/laravel-blogging-platform/actions)
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

### Logging In
Create an account/Login to create blog posts

You can get super Admin credentials in `config/settings.php`

### The News API imports
The External news API data is imported after every 1 minutes. In ideal production development, this should be 3,4 hours as described in order to have the latest news.

The news are queued and run when the server is free to do so. Laravel also adds option to run the schedular on multiple servers.

To run the scheduler locally;

` php artisan schedule:work
`

Then, run the queues;

`php artisan queue:work` or `php artisan queue:listen`

For more on auto calling this, look at the next [Docker](#Docker) section.


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

seed data to set up roles and super Admin

`docker-compose exec app php artisan db:seed`

NOTE: The `start.sh` file takes care of schedulers and queued jobs that auto imports the Eternal Posts from API.

Ideally, the `60s` interval is for demo purposes, in normal running of the App, 3/4 hts interval makes much sense.

#### Scalling
The schedular and the queues are all run on different docker containers, all different from the main web server. With this, he workloads are split in different container and can be scalled independently.

We can achieve multilpe containers running the queues, the schedular, and the web server.

#### More docker commands

You can also run more commands via

`docker-compose exec app [command here]`

access you app via link;

`http:your_ip:8000` or `localhost:8000`

[Extra] - to force  create images

`docker-compose up -d --force-recreate --no-deps --build`

Make sure to `php artisan config:clear` before fall back to using localhost

## Running Tests

`php artisan run test`

## What I would have done extra/better given more time
- Better UI and tweaks; infinite scroll
- Add posts search
- Handle catching blog data with Workbox; stale while revalidate approach and add click to view new posts on new data load
- Add push notifications to notify new posts
- Add Browser tests and end-to-end tests
- Increase test coverage for the code

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
