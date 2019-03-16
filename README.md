# Carzbid

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

Carzbid helps commuters to search or advertise car rides.

This is a project for _CS2102 (Database Systems)_ at the [School of Computing](https://www.comp.nus.edu.sg), [National University of Singapore](http://www.nus.edu.sg).


## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development.

### Prerequisites

You need to have `redis` installed on your computer. Run the following commands to install:

```
sudo apt install redis-server php-redis
```

### Install Dependencies

```
composer install
```

### Initialize Database

- Change database configuration in the following files:
```
phinx.yml
application/config/database.php
```

- Run migration:
```
vendor/bin/phinx migrate -e development`
```

- Seed the database: 
```
vendor/bin/phinx seed:run
```

### Optional

If you are using `bitnami`, configure `base_url`.


## Built With

- [CodeIgniter](https://codeigniter.com/) - The web framework used
- [Bootstrap 4](https://getbootstrap.com/docs/4.3/getting-started/introduction/) - The front-end framework used
- [Phinx](https://phinx.org/) - Database migrations
- [Faker](https://github.com/fzaninotto/Faker) - Sample data generation


## Authors

See the list of [contributors](https://github.com/yuntongzhang/carzbid/graphs/contributors) who participated in this project.


## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
