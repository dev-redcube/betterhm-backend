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

2. .env Datei herunterladen und `APP_KEY` ausfüllen.  
`APP_KEY` wird verwendet, um z.B. cookies zu verschlüsseln und sieht ca. so aus: `base64:y7LAuRnvZAgnFOrvbrwmPj2hqcR9iIrJ9A4VLMrf920=`
```env
wget https://raw.githubusercontent.com/dev-redcube/betterhm-backend/main/.env.prod.example -O .env
```
Dieser App-Key sollte sich später nicht mehr ändern

3. Container starten
```shell
docker compose up -d
```
