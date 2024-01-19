dotenv:
	docker compose run --rm app composer require vlucas/phpdotenv

database:
	docker compose run --rm app composer require illuminate/database

deps:
	docker compose run --rm app composer install