PATH:=${PATH}:vendor/bin

.PHONY: *

static-code-analysis:
	psalm --show-info=true

phpcs:
	phpcs --standard=PSR2 src tests

phpunit:
	echo ${PATH}
	phpunit -v --color=always --testdox tests

test: phpunit phpcs

vendor: composer.json
	composer validate --strict
	composer install
