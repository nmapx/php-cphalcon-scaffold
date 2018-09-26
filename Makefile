include Makefile.common

all: build

.PHONY: build
build:
	docker-compose -f docker-compose.dev.yml -p cphalcon_scaffold build --pull --force-rm

.PHONY: composer
composer: composer.lock
	docker-compose -f docker-compose.dev.yml -p cphalcon_scaffold exec -T app composer install --no-interaction

.PHONY: composer-update
composer-update: composer.json
	docker-compose -f docker-compose.dev.yml -p cphalcon_scaffold exec -T app composer update

.PHONY: restart
restart:
	docker-compose -f docker-compose.dev.yml -p cphalcon_scaffold restart -t 1

.PHONY: up
up:
	docker-compose -f docker-compose.dev.yml -p cphalcon_scaffold up -d --force-recreate

.PHONY: down
down:
	docker-compose -f docker-compose.dev.yml -p cphalcon_scaffold down
