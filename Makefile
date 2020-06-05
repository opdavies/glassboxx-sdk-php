.PHONY: *

static-code-analysis: vendor
	php vendor/bin/psalm --show-info=true

phpcs:
	php vendor/bin/phpcs --standard=PSR2 src tests

phpunit:
	php vendor/bin/phpunit -v --color=always --testdox tests

test: phpunit phpcs

vendor: composer.json
	composer validate --strict
	composer install
