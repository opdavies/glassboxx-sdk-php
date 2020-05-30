.PHONY: *

phpcs:
	php vendor/bin/phpcs --standard=PSR2 src tests

phpunit:
	php vendor/bin/phpunit -v --color=always --testdox tests

test: phpunit phpcs
