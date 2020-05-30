.PHONY: *

phpunit:
	php vendor/bin/phpunit -v --color=always --testdox tests

test: phpunit

