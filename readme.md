# About

Laravel Material Kit is a ready to use Laravel app with [Toastr](https://packagist.org/packages/oriceon/toastr-5-laravel) and [Material Kit](http://www.creative-tim.com/live/material-kit).

## Get Started

### Download zip from repo

You can just clone or download the master file

```sh
$ git clone https://github.com/alexela8882/laravel-material-kit.git
```

### Composer

`cd` into root folder of the project and run this command to install all dependencies

```sh
$ composer install
```

## Configure Backend

Cloning this project wont provide you a `.env` file. You can create using this command:

```sh
$ php -r "copy('.env.example', '.env');"
```

### Generate key

```sh
$ php artisan key:generate
```

Lastly

```sh
$ php artisan serve
```

All Done!

You can now visit your website in [http://localhost:8000](http://localhost:8000).
