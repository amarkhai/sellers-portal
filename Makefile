DC := docker-compose -f docker-compose.yml -f docker-compose.local.yml
PHPUNIT := php -dxdebug.enable=0 vendor/bin/phpunit

all:
	@echo "There is no action for all\n"

preup:
	@if [ ! -d docker/postgresql_data ]; then mkdir -p docker/postgresql_data ; fi
	@if [ ! -d docker/nginx/logs ]; then mkdir -p docker/nginx/logs ; fi

stop:
	$(DC) stop

up: preup
	$(DC) up -d --remove-orphans
	$(DC) exec app composer install --prefer-dist
	$(DC) exec app bin/console cache:clear
	$(DC) exec app bin/console cache:warmup

app-shell:
	$(DC) exec app bash

check:
	$(DC) exec php vendor/bin/psalm
	$(DC) exec php vendor/bin/phpstan analyze src
	$(DC) exec php vendor/bin/php-cs-fixer fix src