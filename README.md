## Smart Quote

#### Smart Quotation is a Laravel-based backend application that enables efficient handling of customer quote summaries. It includes robust export capabilities in both PDF and CSV formats and AI-enhanced suggestions using OpenAI GPT-4.0.

### Table of contents

-   [About](#about)
-   [Motivation](#motivation)
-   [Features](#features)
-   [Design Decisions](#design-decisions)
-   [Installation Instructions](#installation-instructions)
    -   [Build the Front End Assets with Mix](#build-the-front-end-assets-with-mix)
    -   [Optionally Build Cache](#optionally-build-cache)
-   [Seeds](#seeds)
    -   [Product Service seeder](#seeded-roles)
-   [Open AI](#AI-Integration)
    -   [Open AI Model](#seeded-roles)
-   [Routes](#routes)
-   [Other API keys](#other-api-keys)
-   [Environment File](#environment-file)
-   [Approach](#approach)
-   [Opening an Issue](#opening-an-issue)

### About

Smart Quote enables efficient handling of quote generation with a focus on profitability and sustainability. Users can:

    - Input a list of products/services with cost, sell price, and quantity
    - Add estimated labor hours and labor cost per hour
    - Define fixed overheads and target profit margins

    The app performs core profitability calculations, identifies low-margin line items, and uses OpenAI GPT-4.0 to suggest data-driven improvements. All generated PDF and CSV reports are versioned and saved in the database, allowing historical access and traceability.

    AI plays a strategic role in enhancing profitability by:

    - Recommending alternative products to improve margins
    - Suggesting labor or resource allocation changes
    - Generating a user-friendly profitability summary

### Motivation
The backend is the engine that powers the Smart Quote system. It handles all the heavy lifting — from managing quote data and running profitability calculations to storing reports and interacting with AI to generate helpful suggestions.

I chose to build it with Laravel because it’s a solid and reliable PHP framework that makes it easier to write clean, maintainable code while handling lots of functionality out of the box. This backend acts as the bridge between the frontend and the data, making sure everything runs smoothly and securely.

Integrating OpenAI’s GPT-4 into the backend lets us offer smart suggestions to users, helping them optimize their quotes with AI-powered insights without exposing any sensitive API keys on the frontend.

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
| Calculates gross margin, labor cost, overheads, and highlights low-margin line items                                                                 |
| Uses OpenAI GPT-4.0 to suggest better products, optimize margins, and summarize profitability                                                        |
| Profitability health indicator (Green / Amber / Red), editable AI suggestions                                                                        |
| Warns when total labor hours exceed a sustainable threshold                                                                                          |
| Generate pdf and csv reports                                                                                                                         |
| User ip address tracking and based on ip, reports are fetched                                                                                        |
| User generated pdf and csv files are stored in public directory and in table                                                                         |
| Versioning of the reports                                                                                                                            |
| User can download different version of reports                                                                                                       |
| Middleware for CORS issue for frontend and backend                                                                                                   |


### Design Decisions

1. Why Laravel? I picked Laravel 10 because it’s easy to work with, has great community support, and helps speed up development with its built-in tools like routing, validation, and security features.
2. API-First: The backend is designed as a clean API that the frontend talks to. This keeps things flexible — it means the same backend could support other clients later, like mobile apps or other services.
3. Organized Code: I structured the code into clear parts — controllers handle requests, services do the business logic, and models manage data. This makes the code easier to understand and maintain.
4. OpenAI Integration: All the AI work happens on the backend, keeping the OpenAI keys secure. The backend sends quote data to GPT-4 and returns useful suggestions to the frontend.
5. Data Storage: Reports and quote versions are saved in a database, making it easy to track history and let users access past reports.
6. Clean & Scalable: I followed best practices to keep the code clean and easy to grow in the future, so it’s ready for more features or changes down the road.

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
    The application comes with a sample Bill of Materials (BoM) provided in the file bill_of_material.csv. This file contains real-world product names, trade prices, retail pricing, and quantities. It is used to seed the products table during the initial setup.

##### Seeded Products Formats

| name           | slug | quantity       | trade_price      | retail_price     | mpn       | sku       | status  
| 100? 4K DB100 TV Black Frame, Back & Glass   | 100-4k-db100-tv-black-frame-back-glass | 1  | 32083.10 | 54999.60 | NULL | DB100BB | 1
| AIM8 TWO Series 2, 8" 2-way, In-Ceiling Speaker | aim8-two-series-2-8-2-way-in-ceiling-speaker | 4  | 786.68  | 2360.00  | NULL | NULL | 1


### AI-Integration

##### AI Integration

    - Model: GPT-4.0 (via OpenAI API)
    - Purpose: Analyze selected product data, identify optimization opportunities, and generate client-friendly summaries
    - Outcome: Enhances profitability while maintaining product quality

### Routes

```bash
+--------+----------------------------------------+---------------------------------------+-----------------------------------------------+-----------------------------------------------------------------------------------------------------------------+--------------------------------------------------------------+
| Domain | Method                                 | URI                                   | Name                                          | Action                                                                                                          | Middleware                                                   |
+--------+----------------------------------------+---------------------------------------+-----------------------------------------------+-----------------------------------------------------------------------------------------------------------------+--------------------------------------------------------------+
|  127.0.0.1      | GET|HEAD                               | /api/products                                     | fetch-all-products                                       | App\Http\Controllers\ProductServiceController@fetchProducts                                                                  | web                                             |
|  127.0.0.1    | POST                                   | /api/suggestion                          | ai.suggestion                                  | App\Http\Controllers\UsersManagementController@search                                                           | web  |
|  127.0.0.1    | GET|HEAD                               | /api/report/fetch-all              | report.fetch                                 | App\Http\Controllers\ExportReportController@fetchAllReports                                                      | web                                    |
|  127.0.0.1      | POST                               | /api/report/export-quote-summary            | report.export                               | App\Http\Controllers\ExportReportController@exportReport                                                    | web                                    |
+--------+----------------------------------------+---------------------------------------+-----------------------------------------------+-----------------------------------------------------------------------------------------------------------------+--------------------------------------------------------------+
```

### Other API keys

-   [OPEN AI Keys](https://platform.openai.com/api-keys#get-an-api-key)
-   [OPENAI_MODEL](https://platform.openai.com/api-keys#get-an-model)

### Environment File

Example `.env` file:

```bash
APP_NAME=SmartQuote
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost
APP_PROJECT_VERSION=1.0

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

OPENAI_API_KEY=
OPENAI_MODEL=
```

### Approach

    - Clean Architecture: Followed MVC and service-oriented design
    - AI Suggestions: GPT-4 used to evaluate pricing, swap alternatives, and summarize business insights
    - Report System: Version-controlled, easily exportable, and traceable for audit/review
    - Profitability Health: Clearly indicates quote status (Green: Profitable, Amber: Caution, Red: Loss)



### Opening an Issue

Before opening an issue there are a couple of considerations:

-   You are all awesome!
-   **Please Read the instructions** and make sure all steps were _followed correctly_.
-   **Please Check** that the issue is not _specific to the development environment_ setup.
-   **Please Provide** _duplication steps_.
-   **Please Attempt to look into the issue**, and if you _have a solution, make a pull request_.
-   **Please Show that you have made an attempt** to _look into the issue_.
-   **Please Check** to see if the issue you are _reporting is a duplicate_ of a previous reported issue.