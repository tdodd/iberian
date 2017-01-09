# Iberian database project
A database allowing users to search for and view relationships between migrants from Spain and Portugal between 1400 and 1600 A.D.

# Technologies
+ PHP
+ Laravel Framework
+ MySql
+ Google's material design

# For Developers

### Development Environment
+ You must specify the proper path to the 'language' route, based on your development environment. The file is located in `/public/js/locale.js`. On line 31, set the ajax URL to:
  * Windows: `url: LANG_WINDOWS`
  * Unix: `url: LANG_UNIX`

+ Also be sure to copy `.env.example` to a file called `.env` and set the following variables:
  * `APP_KEY`: open the project root in a terminal, and typing `php artisan key:generate`
  * `DB_HOST`: mysql database host address (e.g. 127.0.0.1)
  * `DB_DATABASE`: database name (e.g iberian)
  * `DB_USERNAME` database username
  * `DB_PASSWORD` database password