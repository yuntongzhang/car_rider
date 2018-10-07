# Car Rider

_CS2102 (Database Systems) Project_

## Set up

- clone this repo

- run `composer install` to install the dependencies

- change the database configuration in `phinx.yml` and `application/config/database.php`

- Run migration with `vendor/bin/phinx migrate -e development`

- Seed the database with `vendor/bin/phinx seed:run`

- (Optional) Configure your `base_url` if you are using bitnami