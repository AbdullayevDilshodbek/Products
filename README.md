<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Instalition
- composer update
- npm install
- edit .env file
- php artisan key:generate
- php artisan migrate
- php artisan db:seed
- php artisan scribe:generate

## config
add the code:
    /**
     * Binds the Passport routes into the controller.
     *
     * @param  callable|null  $callback
     * @param  array  $options
     * @return void
     */
    public static function routes($callback = null, array $options = ])
    {
        $callback = $callback ?: function ($router) {
            $router;
        };

        $defaultOptions = 
            'prefix' => 'oauth',
            'namespace' => '\Laravel\Passport\Http\Controllers',
        ];

        $options = array_merge($defaultOptions, $options);

        Route::group($options, function ($router) use ($callback) {
            $callback(new RouteRegistrar($router));
        });
    }
-  to the file:
-  vendor/laravel/passport/src/Passport.php
## Api docs
you can show api docs: http://127.0.0.1:8000/docs
## For get Token
- url: http://127.0.0.1:8000/oauth/token
- method: POST
- body: {
-     "grant_type": "password",
-     "client_id": 2,
-     "client_secret": "DwCBkPambiXxhvuag9k5fuhsI6r9OVwwDqy1HopW",
-     "username": "admin",
-     "password": "admin"
- }
