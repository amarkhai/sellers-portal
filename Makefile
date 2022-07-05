DC_DEV := docker-compose -f docker-compose.yml -f docker-compose.dev.yml -f docker-compose.local.yml
DC_STAGE := docker-compose -f docker-compose.yml -f docker-compose.stage.yml -f docker-compose.local.yml
DC_PROD := docker-compose -f docker-compose.yml -f docker-compose.prod.yml -f docker-compose.local.yml
PHPUNIT := php -dxdebug.enable=0 vendor/bin/phpunit

all:
	@echo "There is no action for all\n"

preup:
	@if [ ! -d docker/postgresql_data ]; then mkdir -p docker/postgresql_data ; fi
	@if [ ! -d docker/nginx/logs ]; then mkdir -p docker/nginx/logs ; fi

phpstan-check:
	$(DC_DEV) exec app ./vendor/bin/phpstan analyze src

psalm-check:
	$(DC_DEV) exec app composer psalm

stop-dev:
	$(DC_DEV) stop
stop-stage:
	$(DC_STAGE) stop
stop-prod:
	$(DC_PROD) stop

clean: stop
	$(DC_DEV) rm -fv

up-dev: preup
	$(DC_DEV) up -d --remove-orphans
	$(DC_STAGE) exec app composer install --prefer-dist
	$(DC_STAGE) exec app bin/console cache:clear
up-stage: preup
	$(DC_STAGE) up -d --remove-orphans
	$(DC_STAGE) exec app composer install --prefer-dist
	$(DC_STAGE) exec app bin/console cache:clear
	$(DC_STAGE) exec app bin/console cache:warmup
up-prod: preup
	$(DC_PROD) up -d --remove-orphans
	$(DC_STAGE) exec app composer install --prefer-dist
	$(DC_STAGE) exec app bin/console cache:clear
	$(DC_STAGE) exec app bin/console cache:warmup
app-shell-dev:
	$(DC_DEV) exec app bash
app-shell-stage:
	$(DC_STAGE) exec app bash
app-shell-prod:
	$(DC_PROD) exec app bash
check-dev:
	$(DC_DEV) exec php vendor/bin/psalm
	$(DC_DEV) exec php vendor/bin/phpstan analyze src
	$(DC_DEV) exec php vendor/bin/php-cs-fixer fix src