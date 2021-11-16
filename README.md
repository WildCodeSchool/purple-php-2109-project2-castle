# Defend the Castle

Project 2 of the dev (php) training at the Wild Code School (Sept 2021 class)

## Description: 
For our second project at the Wild Code School, we were asked to make a game, based on a "defend the castle" game. We had to make the development in php for the back-end and we were quite free for the front-end as long as you are passionate about Twig views. All this on a simple MVC structure. Our trainer gave us the basics of this structure. He uses nice providers/libraries such as Twig and Grumphp.

The mechanics of our game are as follows: all games are cooperative, all players play to defend their castle with the same castle. At each turn a player will select a troop, which will fight an enemy troop. At the end of the battle, the difference in power between the two battles will be added or subtracted from the castle's score.

## Steps:
1. Clone the repo from Github.
2. Run `composer install`.
3. Create *config/db.php* from *config/db.php.dist* file and add your DB parameters. Don't delete the *.dist* file, it must be kept.

```php
define('APP_DB_HOST', 'your_db_host');
define('APP_DB_NAME', 'your_db_name');
define('APP_DB_USER', 'your_db_user_wich_is_not_root');
define('APP_DB_PASSWORD', 'your_db_password');
```
4. Import *database.sql* in your SQL server, you can do it manually or use the *migration.php* script which will import a *database.sql* file.
5. Run the internal PHP webserver with `php -S localhost:8000 -t public/`. The option `-t` with `public` as parameter means your localhost will target the `/public` folder.
6. Go to `localhost:8000` with your favorite browser.
7. From this starter kit, create your own web application.

### Windows Users:

If you develop on Windows, you should edit you git configuration to change your end of line rules with this command :

`git config --global core.autocrlf true`

### How does URL routing work ?

![simple_MVC.png](.tours/simple_MVC.png)

We have now entered our different routes (url) in the file `route.php` as well as the controller and the method to call. Each controller will call the corresponding manager according to our needs. The manager will return the information requested by the controller from the database or not, and the controller will send it back to our Twig view.

### Authors:
Developers
Caroline Crépin
Élodie Daubié
Soufiane Aït Ouarraou
Sébastien Violante
Bruno Fernandes

### Formateur:
Romain Clair