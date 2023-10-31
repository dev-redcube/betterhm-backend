# Installation
## Requirements
- php 8
- [composer](https://getcomposer.org/download/)
- docker
- npm für frontent, wird entfernt

## Setup
```shell
git clone https://github.com/dev-redcube/betterhm-backend
cd betterhm-backend
composer install
npm install
cp .env.example .env
php artisan key:generate
./vendor/bin/sail up
```
