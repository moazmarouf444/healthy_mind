# cross team dashboard 
dashboard works with InterFace/Repository Design Pattern , read more about design pattern [here](https://asperbrothers.com/blog/implement-repository-pattern-in-laravel)
## Usage 
create empty dataBase , change database data in .env file 
first run commands 

```bash
composer install
```

```bash
php artisan migrate --seed
```

to migrate base tables of dashboard and create new users , roles and permissions to use dashboard 

dahboard info :

email    : aait@info.com

password : 123456

## Usage for create new section in dashboard


## Dashboard scripts

- The following file contains a set of functions that facilitate working with graphs (admin/charts_functions.js)

## home page cards 

- all home page cards included in (app/traits/menu) file 

## home page weather widget 

-  You can control the country, colors, size, number of days and type of icons from the following link and copy your code and replace it on the home page [here](https://weatherwidget.io/) 

## notes after publish 
- run this commands in server to improve app speed performance
```bash
php artisan optimize
```
```bash
php artisan config:cache
```
```bash
php artisan route:cache
```
## publish
https://documenter.getpostman.com/view/8014927/Uz5FHwEF



