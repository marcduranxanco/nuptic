create:
	docker-compose -f ./docker/docker-compose.yml run --rm composer create-project laravel/laravel laravel

setup:
	sudo chmod -R 777 laravel/storage

install:
	docker-compose -f ./docker/docker-compose.yml run --rm composer install

up:
	docker-compose -f ./docker/docker-compose.yml up

down:
	docker-compose -f ./docker/docker-compose.yml down

dump:
	docker-compose -f ./docker/docker-compose.yml run --rm composer -- dump

php:
	docker-compose -f ./docker/docker-compose.yml run fpm bash

migrate:
	docker-compose -f ./docker/docker-compose.yml run fpm php artisan migrate

phpunit:
	docker-compose -f ./docker/docker-compose.yml run --rm phpunit tests

composer:
	docker-compose -f ./docker/docker-compose.yml run --rm composer $(command)
