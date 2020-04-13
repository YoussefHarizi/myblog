# Laravel Blog
A simple blog for demonstration purpose. Based on Laravel 7.
# Demo
https://youtu.be/aVnhvvWIpPc
# Installation
Clone the repository-
Then cd into the folder with this command-
```sh
cd myblog
```
Then do a composer install
```sh
composer install
```
Then create a environment file using this command-
```sh
cp .env.example .env
```
Then edit .env file with appropriate credential for your database server. Just edit these two parameter(DB_USERNAME, DB_PASSWORD).

Then create a database named "myblog" and then do a database migration using this command-
```sh
php artisan migrate
```
generate application key, which will be used for password hashing, session and cookie encryption etc.
```sh
php artisan key:generate
```
Run ``` npm install ``` to install all front end dependencies
Run ``` php artisan storage:link ``` to link storage to public file
# Screenshots
<p align="center"><img src="https://github.com/YoussefHarizi/myblog/blob/master/screenshots/users.png" style="width:400;box-shadow: 2px 2px 5px black;margin-bottom:2px;"></p>
<p align="center"><img src="https://github.com/YoussefHarizi/myblog/blob/master/screenshots/categories.png" style="width:400;box-shadow: 2px 2px 5px black;margin-bottom:2px"></p>
<p align="center"><img src="https://github.com/YoussefHarizi/myblog/blob/master/screenshots/tags.png" style="width:400;box-shadow: 2px 2px 5px black;margin-bottom:2px"></p>
<p align="center"><img src="https://github.com/YoussefHarizi/myblog/blob/master/screenshots/posts.png" style="width:400;box-shadow: 2px 2px 5px black;margin-bottom:2px"></p>
<p align="center"><img src="https://github.com/YoussefHarizi/myblog/blob/master/screenshots/trashed.png" style="width:400;box-shadow: 2px 2px 5px black;margin-bottom:2px"></p>
<p align="center"><img src="https://github.com/YoussefHarizi/myblog/blob/master/screenshots/profile.png" style="width:400;box-shadow: 2px 2px 5px black;margin-bottom:2px"></p>
<p align="center"><img src="https://github.com/YoussefHarizi/myblog/blob/master/screenshots/front.png" style="width:400;box-shadow: 2px 2px 5px black;"></p>

## Contributing

Do not hesitate to contribute to the project by adapting or adding features ! Bug reports or pull requests are welcome.

## License
This project is released under the [MIT license](https://opensource.org/licenses/MIT).

