database:
	docker compose run --rm app composer require illuminate/database

deps:
	docker compose run --rm app composer install && \
	docker compose run --rm app composer require vlucas/phpdotenv && \
	docker compose run --rm app composer require --dev phpunit/phpunit && \
	docker compose run --rm app composer require illuminate/support

test:
	docker compose run --rm app ./vendor/bin/phpunit tests/