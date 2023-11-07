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
# Run in production
1. docker compose datei ziehen
```shell
wget https://raw.githubusercontent.com/dev-redcube/betterhm-backend/main/docker-compose.prod.yml -O docker-compose.yml
```

2. .env Datei erstellen und mit APP_KEY und weiteren Umgebubgsvariablen befüllen.  
`APP_KEY` wird verwendet, um z.B. cookies zu verschlüsseln und sieht ca. so aus: `base64:y7LAuRnvZAgnFOrvbrwmPj2hqcR9iIrJ9A4VLMrf920=`
```env
APP_KEY=base64:y7LAuRnvZAgnFOrvbrwmPj2hqcR9iIrJ9A4VLMrf920=
APP_ENV=production
APP_DEBUG=false

# Bei bedarf weitere Variablen, z.b. Externe Datenbank/redis
```
3.
```shell
docker compose up -d
```
