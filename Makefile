include Makefile.common

all: compile

compile:
	docker-compose -f docker-compose.dev.yml -p cphalcon_scaffold build --pull --force-rm

composer:
	docker-compose -f docker-compose.dev.yml -p cphalcon_scaffold exec -T app composer install --no-interaction

composer-update:
	docker-compose -f docker-compose.dev.yml -p cphalcon_scaffold exec -T app composer update

restart:
	docker-compose -f docker-compose.dev.yml -p cphalcon_scaffold restart -t 1

up:
	docker-compose -f docker-compose.dev.yml -p cphalcon_scaffold up -d --force-recreate

down:
	docker-compose -f docker-compose.dev.yml -p cphalcon_scaffold down

seed:
	docker-compose -f docker-compose.dev.yml -p cphalcon_scaffold exec -T app ./bin/phinx seed:run

migrate:
	docker-compose -f docker-compose.dev.yml -p cphalcon_scaffold exec -T app ./bin/phinx migrate
