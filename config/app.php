<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services your application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('WP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | The name of this application
    |
    */

    'name' => '',

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Logging Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log settings for your application. Out of
    | the box, Laravel uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Settings: "single", "daily", "syslog", "errorlog"
    |
    */

    'log' => env('APP_LOG', 'daily'),

    'log_level' => env('APP_LOG_LEVEL', 'debug'),

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [
        EvolveEngine\Acf\AcfServiceProvider::class,
        EvolveEngine\Analytics\AnalyticsServiceProvider::class,
        EvolveEngine\Assets\AssetsServiceProvider::class,
        EvolveEngine\Post\CustomPostTypeProvider::class,
        EvolveEngine\Router\RouterServiceProvider::class,
        EvolveEngine\Social\SocialServiceProvider::class,
        EvolveEngine\Theme\ThemeProvider::class,
        EvolveEngine\Utils\UtilityProvider::class,
        EvolveEngine\Template\TemplateServiceProvider::class,
        EvolveSentinel\SentinelServiceProvider::class,

        /*
        |--------------------------------------------------------------------------
        | Optional Service Providers
        |--------------------------------------------------------------------------
        |
        | These providers are optional and generally a case-by-case inclusion
        | pick only the ones that's actually required for your site.
        |
        */
        // EvolveEngine\Queue\QueueServiceProvider::class,

        App\AppServiceProvider::class,
        App\Newsletter\NewsletterServiceProvider::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => [
        'App'       => EvolveEngine\Router\Facades\Route::class,
        'Route'     => EvolveEngine\Router\Facades\Route::class,
        'View'      => EvolveEngine\Views\Facades\View::class,
        'TrueLib'   => EvolveEngine\Utils\Facades\TrueLib::class,
        'PostType'  => EvolveEngine\Post\Facades\PostType::class,
        'AcfHelper' => EvolveEngine\Acf\Facades\Acf::class,
        'Share'     => EvolveEngine\Social\Facades\Share::class,
        'Analytics' => EvolveEngine\Analytics\Facades\Analytics::class,

        'Main'          => App\Facades\Main::class,
        'Newsletter'    => App\Newsletter\Facades\Newsletter::class,
    ],

];
