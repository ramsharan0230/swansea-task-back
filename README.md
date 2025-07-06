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

Smart Quotation is a backend application built using Laravel 10, designed for efficient management of customer quote summaries. It offers seamless generation of PDF and CSV reports and integrates with the OpenAI GPT-4.0 API for enhancing quotations with AI-powered suggestions.

The system includes:

    Modern RESTful architecture powered by Laravel 10.

    Export capabilities using barryvdh/laravel-dompdf (PDF) and league/csv (CSV).

    AI enhancement using OpenAI GPT-4.0 for refining quote descriptions based on selected products.

    Modular structure using Laravel’s Controller, Request, Resource, and Middleware components.

    IP tracking for user-specific report access and logging.

    Version control for exported reports (PDF & CSV).

    Authentication, soft delete recovery, and CORS middleware for API accessibility.

    It is designed to be developer-friendly, scalable, and extensible, leveraging Laravel's latest features and best practices.

### Features

#### A [Laravel](https://laravel.com/) 10 project.

| Smart Quote Features                                                                                                                                |
| :--------------------------------------------------------------------------------------------------------------------------------------------------- |
| Built on [Laravel](https://laravel.com/) 10                                                                                                          |
| Built on [PHP](https://getbootstrap.com/) 8.1                                                                                                        |
| Uses [MySQL](https://github.com/mysql) Database (can be changed)                                                                                     |
| Uses [Artisan](https://laravel.com/docs/master/artisan) to manage database migration, schema creations, and create/publish page controller templates |
| Dependencies are managed with [COMPOSER](https://getcomposer.org/)                                                                                   |
| Uses [OpenAI](platform.openai.com) API (can be changed)                                                                                              |
| Uses [League/csv] for CSV file generation(can be changed)                                                                                            |
| Uses [barryvdh/laravel-dompdf] for PDF file generation(can be changed)                                                                               |
| Fetch open ai suggestion based on product lists and selection of the product to enhance the quotation                                                |
| Generate pdf and csv reports                                                                                                                         |
| User ip address tracking and based on ip, reports are fetched                                                                                        |
| User generated pdf and csv files are stored in public directory and in table                                                                         |
| Restore Soft Deleted Users                                                                                                                           |
| Versioning of the reports                                                                                                                            |
| User can download different version of reports                                                                                                       |
| Middleware for CORS issue for frontend and backend                                                                                                   |

### Installation Instructions

1. Run `git clone https://github.com/ramsharan0230/swansea-task-back.git swansea-task-back`
2. Create a MySQL database for the project
    - `mysql -u root -p`, if using Vagrant: `mysql -u homestead -psecret`
    - `create database swanseatask_dbase;`
    - `\q`
3. From the projects root run `cp .env.example .env`
4. Configure your `.env` file
5. Run `composer install` from the projects root folder
6. From the projects root folder run `sudo chmod -R 755 ../swansea-task-back`
7. From the projects root folder run `php artisan key:generate`
8. From the projects root folder run `php artisan migrate`
9. From the projects root folder run `composer dump-autoload`
10. From the projects root folder run `php artisan db:seed`

#### Optionally Build Cache

1. From the projects root folder run `php artisan config:cache`

###### And thats it with the caveat of setting up and configuring your development environment. I recommend [Laravel Homestead](https://laravel.com/docs/master/homestead)

### Seeds

##### Seeded Products

| name           | slug | quantity       | trade_price      | retail_price     | mpn       | sku       | status       |
| :-------------- | :------- | :----------- | :-----------  | :----------- |  
| 100? 4K DB100 TV Black Frame, Back & Glass   | 100-4k-db100-tv-black-frame-back-glass | 1  | 32083.10 | 54999.60 | NULL | DB100BB | 1
| AIM8 TWO Series 2, 8" 2-way, In-Ceiling Speaker | aim8-two-series-2-8-2-way-in-ceiling-speaker | 4  | 786.68  | 2360.00  | NULL | NULL | 1

### Routes

```bash
+--------+----------------------------------------+---------------------------------------+-----------------------------------------------+-----------------------------------------------------------------------------------------------------------------+--------------------------------------------------------------+
| Domain | Method                                 | URI                                   | Name                                          | Action                                                                                                          | Middleware                                                   |
+--------+----------------------------------------+---------------------------------------+-----------------------------------------------+-----------------------------------------------------------------------------------------------------------------+--------------------------------------------------------------+
|        | GET|HEAD                               | /api/products                                     | fetch-all-products                                       | App\Http\Controllers\ProductServiceController@fetchProducts                                                                  | web                                             |
|        | POST                                   | /api/suggestion                          | ai.suggestion                                  | App\Http\Controllers\UsersManagementController@search                                                           | web  |
|        | GET|HEAD                               | /api/report/fetch-all              | report.fetch                                 | App\Http\Controllers\ExportReportController@fetchAllReports                                                      | web                                    |
|        | POST                               | /api/report/export-quote-summary            | report.export                               | App\Http\Controllers\ExportReportController@exportReport                                                    | web                                    |
+--------+----------------------------------------+---------------------------------------+-----------------------------------------------+-----------------------------------------------------------------------------------------------------------------+--------------------------------------------------------------+
```

### Other API keys

-   [OPEN AI Keys](https://platform.openai.com/api-keys#get-an-api-key)
-   [OPENAI_MODEL](https://platform.openai.com/api-keys#get-an-model)

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

OPENAI_API_KEY=
OPENAI_MODEL=
```

### Opening an Issue

Before opening an issue there are a couple of considerations:

-   You are all awesome!
-   **Please Read the instructions** and make sure all steps were _followed correctly_.
-   **Please Check** that the issue is not _specific to the development environment_ setup.
-   **Please Provide** _duplication steps_.
-   **Please Attempt to look into the issue**, and if you _have a solution, make a pull request_.
-   **Please Show that you have made an attempt** to _look into the issue_.
-   **Please Check** to see if the issue you are _reporting is a duplicate_ of a previous reported issue.