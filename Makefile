.PHONY: *

static-code-analysis:
	php vendor/bin/psalm --show-info=true

phpcs:
	php vendor/bin/phpcs --standard=PSR2 src tests

phpunit:
	php vendor/bin/phpunit -v --color=always --testdox tests

test: phpunit phpcs
