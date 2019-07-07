# ** Miniproject App **

Miniproject is a project app that served me to test out PHP and Laravel skills.
It's a basic kind of blog, with possibilities to create, edit, update and delete blog posts.

## ** Configuration **

### ** Step 1: Hosts **

Copy following lines to `C:/Windows/System32/drivers/etc/hosts`. When editing hosts file you must be logged in with Administrator privileges in Windows system.

```
#----------------------------------------------
# MINIPROJECT APP - LOCALHOST
#----------------------------------------------
127.0.0.1    www.miniproject.com
127.0.0.1    miniproject.com

```

### ** Step 3: Clone project **

```
https://github.com/matijavavetic/miniproject.git
```
### ** Step 4: ENV **

Create env file from env.example:

```
env.example
```

### ** Step 5: Composer **

Run following command in terminal:

```
composer update
```

### ** Step 6: Key **

Run following command in terminal:

```
php artisan key:generate
```

### ** Step 7: npm **

Run following command in terminal:

```
npm install
```

```
npm run development
```

### ** Step 8: Database **

Create database schema `miniproject`.

Set default character set utf8mb4 and collate utf8mb4_unicode-ci.

Run following commands in terminal to start migrations:

```
php artisan migrate:refresh
```

### ** Step 9: UNIT TEST **

Run following commands in terminal to start unit testing:

```
./vendor/bin/phpunit
```


If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).