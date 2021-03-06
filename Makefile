
cs:
	./vendor/bin/phpcs --standard=PSR2 --report=emacs --extensions=php --warning-severity=0 src/ tests/PHPSA/

check-src:
	./bin/phpsa check -vvv ./src

# Rubric, hacking themselves (c) @Kistamushken
check-fixtures:
	./bin/phpsa check -vvv ./fixtures

# For local dev
dev:
	./bin/phpsa check -vvv ./sandbox

tests-local:
	./vendor/bin/phpunit -v

# Alias for tests-local
tests: tests-local

tests-ci:
	./vendor/bin/phpunit -v --debug --coverage-clover=coverage.clover

test: tests-local cs

ci: cs tests-ci check-fixtures check-src
