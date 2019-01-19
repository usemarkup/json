.PHONY: all

default: all;

standards:
	vendor/bin/phpcs src  --standard=ruleset.xml -p --colors
	vendor/bin/phpcs tests --standard=psr2

static-analysis:
	vendor/bin/phpstan.phar analyse -l 7 src
	vendor/bin/phpstan.phar analyse -l 4 tests

unit:
	vendor/bin/phpunit

code-coverage:
	vendor/bin/phpunit --coverage-html=coverage

all: standards static-analysis unit
