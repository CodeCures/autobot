## Installation
- clone the project 
```bash 
git clone https://github.com/CodeCures/autobot.git
```
- run to create a copy of .env file
```bash
 cp .env.example .env
```
- Setup you database credentials
```bash
 DB_CONNECTION=mysql
 DB_HOST=127.0.0.1
 DB_PORT=3306
 DB_DATABASE=autobots_db
 DB_USERNAME=root
 DB_PASSWORD=
```
- Generate app key by running
```bash
 php artisan key:generate
```
- Migrate your database by running
```bash
 php artisan migrate
```
- Install required javascript packages
```bash
 npm install
```
- start vite server
```bash
 npm run dev
```

- start vite server
```bash
 npm run dev
```

- the app is heavily dependent of background jobs so you might want to run
```bash
 php artisan queue:listen --timeout=0
```

```bash
 php artisan schedule:work
```

- you can now start the app by running
```bash
 php artisan serve
```
or visit http://autobot.test if you are using laravel herd

# **Note**

The app uses the eloquent factory and jobs to generate the autobot data, the throttling rate limiter is provided in the app service prodiver so you might want to take a look at those files to understand the logic

# API documentation
```bash
 {YOUR_DOMAIN}/docs/index.html
```
Example: http://autobot.test/docs/index.html
