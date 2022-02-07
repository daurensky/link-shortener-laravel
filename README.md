# Short links app

## Requirements
- docker
- docker-compose

## Installation
1. cp .env.example .env
2. docker-compose up --build -d
3. docker-compose exec app bash
4. composer install
5. php artisan key:generate
6. php artisan migrate