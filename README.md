## Smart Quote

#### Smart Quotation is a Laravel-based backend application that enables efficient handling of customer quote summaries. It includes robust export capabilities in both PDF and CSV formats and AI-enhanced suggestions using OpenAI GPT-4.0.

### Table of contents

-   [About](#about)
-   [Features](#features)
-   [Installation Instructions](#installation-instructions)
    -   [Build the Front End Assets with Mix](#build-the-front-end-assets-with-mix)
    -   [Optionally Build Cache](#optionally-build-cache)
-   [Seeds](#seeds)
    -   [Product Service seeder](#seeded-roles)
-   [Routes](#routes)
-   [Other API keys](#other-api-keys)
-   [Environment File](#environment-file)

### About

Laravel 10 with user authentication, registration with email confirmation, social media authentication, password recovery, and captcha protection. Uses official [Bootstrap 4](https://getbootstrap.com). This also makes full use of Controllers for the routes, templates for the views, and makes use of middleware for routing. Project can be stood up in minutes.

### Features

#### A [Laravel](https://laravel.com/) 10 with [Bootstrap](https://getbootstrap.com) 4.x project.

| Laravel Auth Features                                                                                                                                |
| :--------------------------------------------------------------------------------------------------------------------------------------------------- |
| Built on [Laravel](https://laravel.com/) 10                                                                                                          |
| Built on [Bootstrap](https://getbootstrap.com/) 4                                                                                                    |
| Uses [MySQL](https://github.com/mysql) Database (can be changed)                                                                                     |
| Uses [Artisan](https://laravel.com/docs/master/artisan) to manage database migration, schema creations, and create/publish page controller templates |
| Dependencies are managed with [COMPOSER](https://getcomposer.org/)                                                                                   |
| Laravel Scaffolding **User** and **Administrator Authentication**.                                                                                   |
| User [Socialite Logins](https://github.com/laravel/socialite) ready to go - See API list used below                                                  |
| [Google Maps API v3](https://developers.google.com/maps/documentation/javascript/) for User Location lookup and Geocoding                            |
| CRUD (Create, Read, Update, Delete) Themes Management                                                                                                |
| CRUD (Create, Read, Update, Delete) User Management                                                                                                  |
| Robust [Laravel Logging](https://laravel.com/docs/master/errors#logging) with admin UI using MonoLog                                                 |
| Google [reCaptcha Protection with Google API](https://developers.google.com/recaptcha/)                                                              |
| User Registration with email verification                                                                                                            |
| Makes use of Laravel [Mix](https://laravel.com/docs/master/mix) to compile assets                                                                    |
| Makes use of [Language Localization Files](https://laravel.com/docs/master/localization)                                                             |
| Active Nav states using [Laravel Requests](https://laravel.com/docs/master/requests)                                                                 |
| Restrict User Email Activation Attempts                                                                                                              |
| Capture IP to users table upon signup                                                                                                                |
| Uses [Laravel Debugger](https://github.com/barryvdh/laravel-debugbar) for development                                                                |
| Makes use of [Password Strength Meter](https://github.com/elboletaire/password-strength-meter)                                                       |
| Makes use of [hideShowPassword](https://github.com/cloudfour/hideShowPassword)                                                                       |
| User Avatar Image AJAX Upload with [Dropzone.js](https://www.dropzonejs.com/#configuration)                                                          |
| User Gravatar using [Gravatar API](https://github.com/creativeorange/gravatar)                                                                       |
| User Password Reset via Email Token                                                                                                                  |
| User Login with remember password                                                                                                                    |
| User [Roles/ACL Implementation](https://github.com/jeremykenedy/laravel-roles)                                                                       |
| Roles and Permissions GUI                                                                                                                            |
| Makes use of [Laravel's Soft Delete Structure](https://laravel.com/docs/master/eloquent#soft-deleting)                                               |
| Soft Deleted Users Management System                                                                                                                 |
| Permanently Delete Soft Deleted Users                                                                                                                |
| User Delete Account with Goodbye email                                                                                                               |
| User Restore Deleted Account Token                                                                                                                   |
| Restore Soft Deleted Users                                                                                                                           |
| View Soft Deleted Users                                                                                                                              |
| Captures Soft Delete Date                                                                                                                            |
| Captures Soft Delete IP                                                                                                                              |
| Admin Routing Details UI                                                                                                                             |
| Admin PHP Information UI                                                                                                                             |
| Eloquent user profiles                                                                                                                               |
| User Themes                                                                                                                                          |
| 404 Page                                                                                                                                             |
| 403 Page                                                                                                                                             |
| Configurable Email Notification via [Laravel-Exception-Notifier](https://github.com/jeremykenedy/laravel-exception-notifier)                         |
| Activity Logging using [Laravel-logger](https://github.com/jeremykenedy/laravel-logger)                                                              |
| Optional 2-step account login verfication with [Laravel 2-Step Verification](https://github.com/jeremykenedy/laravel2step)                           |
| Uses [Laravel PHP Info](https://github.com/jeremykenedy/laravel-phpinfo) package                                                                     |
| Uses [Laravel Blocker](https://github.com/jeremykenedy/laravel-blocker) package                                                                      |

### Installation Instructions

1. Run `git clone https://github.com/ramsharan0230/swansea-task-back.git swansea-task-back`
2. Create a MySQL database for the project
    - `mysql -u root -p`, if using Vagrant: `mysql -u homestead -psecret`
    - `create database swanseatask_dbase;`
    - `\q`
3. From the projects root run `cp .env.example .env`
4. Configure your `.env` file
5. Install composer, php-mysql, php-ext and php-dom (dependent on your distrubtion, For Debian run `apt install composer php-mysql php-ext php-dom`)
6. Run `composer update` from the projects root folder
7. From the projects root folder run:

```
php artisan vendor:publish --tag=laravelroles &&
php artisan vendor:publish --tag=laravel2step &&
php artisan vendor:publish --tag=laravel-email-database-log-migration
```

7. From the projects root folder run `sudo chmod -R 755 ../laravel-auth`
8. From the projects root folder run `php artisan key:generate`
9. From the projects root folder run `php artisan migrate`
10. From the projects root folder run `composer dump-autoload`
11. From the projects root folder run `php artisan db:seed`

#### Optionally Build Cache

1. From the projects root folder run `php artisan config:cache`

###### And thats it with the caveat of setting up and configuring your development environment. I recommend [Laravel Homestead](https://laravel.com/docs/master/homestead)

### Seeds

##### Seeded Roles

-   Unverified - Level 0
-   User - Level 1
-   Administrator - Level 5

##### Seeded Permissions

-   view.users
-   create.users
-   edit.users
-   delete.users

##### Seeded Users

| Email           | Password | Access       |
| :-------------- | :------- | :----------- |
| user@user.com   | password | User Access  |
| admin@admin.com | password | Admin Access |

##### Themes Seed List

-   [ThemesTableSeeder](https://github.com/jeremykenedy/laravel-auth/blob/master/database/seeders/ThemesTableSeeder.php)
-   NOTE: A lot of themes render incorrectly on Bootstrap 4 since their core was built to override Bootstrap 4. These will be updated soon and ones that do not render correctly will be removed from the seed. In the mean time you can remove them from the seed or manaully from the UI or database.

##### Blocked Types Seed List

-   [BlockedTypeTableSeeder.php](https://github.com/jeremykenedy/laravel-auth/blob/master/database/seeders/BlockedTypeTableSeeder.php)

| Slug        | Name         |
| :---------- | :----------- |
| email       | E-mail       |
| ipAddress   | IP Address   |
| domain      | Domain Name  |
| user        | User         |
| city        | City         |
| state       | State        |
| country     | Country      |
| countryCode | Country Code |
| continent   | Continent    |
| region      | Region       |

##### Blocked Items Seed List

-   [BlockedItemsTableSeeder.php](https://github.com/jeremykenedy/laravel-auth/blob/master/database/seeders/BlockedItemsTableSeeder.php)

| Type   | Value          | Note                                     |
| :----- | :------------- | :--------------------------------------- |
| domain | test.com       | Block all domains/emails @test.com       |
| domain | test.ca        | Block all domains/emails @test.ca        |
| domain | fake.com       | Block all domains/emails @fake.com       |
| domain | example.com    | Block all domains/emails @example.com    |
| domain | mailinator.com | Block all domains/emails @mailinator.com |

### Routes

```bash
+--------+----------------------------------------+---------------------------------------+-----------------------------------------------+-----------------------------------------------------------------------------------------------------------------+--------------------------------------------------------------+
| Domain | Method                                 | URI                                   | Name                                          | Action                                                                                                          | Middleware                                                   |
+--------+----------------------------------------+---------------------------------------+-----------------------------------------------+-----------------------------------------------------------------------------------------------------------------+--------------------------------------------------------------+
|        | GET|HEAD                               | /                                     | welcome                                       | App\Http\Controllers\WelcomeController@welcome                                                                  | web,checkblocked                                             |
|        | GET|HEAD                               | _debugbar/assets/javascript           | debugbar.assets.js                            | Barryvdh\Debugbar\Controllers\AssetController@js                                                                | Barryvdh\Debugbar\Middleware\DebugbarEnabled,Closure         |
|        | POST                                   | search-users                          | search-users                                  | App\Http\Controllers\UsersManagementController@search                                                           | web,auth,activated,role:admin,activity,twostep,checkblocked  |
|        | GET|HEAD                               | social/handle/{provider}              | social.handle                                 | App\Http\Controllers\Auth\SocialController@getSocialHandle                                                      | web,activity,checkblocked                                    |
|        | GET|HEAD                               | social/redirect/{provider}            | social.redirect                               | App\Http\Controllers\Auth\SocialController@getSocialRedirect                                                    | web,activity,checkblocked                                    |
+--------+----------------------------------------+---------------------------------------+-----------------------------------------------+-----------------------------------------------------------------------------------------------------------------+--------------------------------------------------------------+
```

### Other API keys

-   [Google Maps API v3 Key](https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key)

### Environment File

Example `.env` file:

```bash
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost
APP_PROJECT_VERSION=7

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=pusher
CACHE_DRIVER=file
SESSION_DRIVER=file
SESSION_LIFETIME=120
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

EMAIL_EXCEPTION_ENABLED=false
EMAIL_EXCEPTION_FROM="${MAIL_FROM_ADDRESS}"
EMAIL_EXCEPTION_TO='email1@gmail.com, email2@gmail.com'
EMAIL_EXCEPTION_CC=''
EMAIL_EXCEPTION_BCC=''
EMAIL_EXCEPTION_SUBJECT=''

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

ACTIVATION=true
ACTIVATION_LIMIT_TIME_PERIOD=24
ACTIVATION_LIMIT_MAX_ATTEMPTS=3
NULL_IP_ADDRESS=0.0.0.0

DEBUG_BAR_ENVIRONMENT=local

```

#### Laravel Developement Packages Used References

-   https://laravel.com/docs/master/authentication
-   https://laravel.com/docs/master/authorization
-   https://laravel.com/docs/master/routing
-   https://laravel.com/docs/master/migrations
-   https://laravel.com/docs/master/queries
-   https://laravel.com/docs/master/views
-   https://laravel.com/docs/master/eloquent
-   https://laravel.com/docs/master/eloquent-relationships
-   https://laravel.com/docs/master/requests
-   https://laravel.com/docs/master/errors

###### Updates:

-   Update to Laravel 10 (Major Changes)
-   Update to Laravel 9
-   Update to Laravel 8
-   Update to Laravel 7 [See changes in this PR](https://github.com/jeremykenedy/laravel-auth/pull/348/files)
-   Update to Laravel 6
-   Update to Laravel 5.8
-   Added [Laravel Blocker Package](https://github.com/jeremykenedy/laravel-blocker)
-   Added [PHP Info Package](https://github.com/jeremykenedy/laravel-phpinfo)
-   Update to Bootstrap 4
-   Update to Laravel 5.7
-   Added optional 2-step account login verfication with [Laravel 2-Step Verification](https://github.com/jeremykenedy/laravel2step)
-   Added activity logging using [Laravel-logger](https://github.com/jeremykenedy/laravel-logger)
-   Added Configurable Email Notification using [Laravel-Exception-Notifier](https://github.com/jeremykenedy/laravel-exception-notifier)
-   Update to Laravel 5.5
-   Added User Delete with Goodbye email
-   Added User Restore Deleted Account from email with secure token
-   Added [Soft Deletes](https://laravel.com/docs/master/eloquent#soft-deleting) and Soft Deletes Management panel
-   Added User Account Settings to Profile Edit
-   Added User Change Password to Profile Edit
-   Added User Delete Account to Profile Edit
-   Added [Password Strength Meter](https://github.com/elboletaire/password-strength-meter)
-   Added [hideShowPassword](https://github.com/cloudfour/hideShowPassword)
-   Added Admin Routing Details
-   Admin PHP Information
-   Added Robust [Laravel Logging](https://laravel.com/docs/master/errors#logging) with admin UI using MonoLog
-   Added Active Nav states using [Laravel Requests](https://laravel.com/docs/master/requests)
-   Added [Laravel Debugger](https://github.com/barryvdh/laravel-debugbar) with Service Provider to manage status in `.env` file.
-   Updated Capture IP not found IP address
-   Added User Avatar Image AJAX Upload with [Dropzone.js](http://www.dropzonejs.com/#configuration)
-   Added User Gravatar using Gravatar API
-   Added Themes Management.
-   Add user profiles with seeded list and global view
-   Major overhaul on Laravel 5.4
-   Update from Laravel 5.1 to 5.2
-   Added eloquent editable user profile
-   Added IP Capture
-   Added Google Maps API v3 for User Location lookup
-   Added Google Maps API v3 for User Location Input Geocoding
-   Added Google Maps API v3 for User Location Map with Options
-   Added CRUD(Create, Read, Update, Delete) User Management

```

-   Tree command can be installed using brew: `brew install tree`
-   File tree generated using command `tree -a -I '.git|node_modules|vendor|storage|tests'`

### Opening an Issue

Before opening an issue there are a couple of considerations:

-   You are all awesome!
-   **Please Read the instructions** and make sure all steps were _followed correctly_.
-   **Please Check** that the issue is not _specific to the development environment_ setup.
-   **Please Provide** _duplication steps_.
-   **Please Attempt to look into the issue**, and if you _have a solution, make a pull request_.
-   **Please Show that you have made an attempt** to _look into the issue_.
-   **Please Check** to see if the issue you are _reporting is a duplicate_ of a previous reported issue.