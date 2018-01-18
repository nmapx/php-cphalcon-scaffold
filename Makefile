include Makefile.common

all: compile

compile:
	docker-compose -f docker-compose.dev.yml -p cphalcon_bootstrap build --pull --force-rm

composer:
	docker-compose -f docker-compose.dev.yml -p cphalcon_bootstrap exec -T app composer install --no-interaction

composer-update:
	docker-compose -f docker-compose.dev.yml -p cphalcon_bootstrap exec -T app composer update

restart:
	docker-compose -f docker-compose.dev.yml -p cphalcon_bootstrap restart -t 1

up:
	docker-compose -f docker-compose.dev.yml -p cphalcon_bootstrap up -d --force-recreate

down:
	docker-compose -f docker-compose.dev.yml -p cphalcon_bootstrap down

seed:
	docker-compose -f docker-compose.dev.yml -p cphalcon_bootstrap exec -T app ./bin/phinx seed:run

migrate:
	docker-compose -f docker-compose.dev.yml -p cphalcon_bootstrap exec -T app ./bin/phinx migrate
