format_check:
	@./vendor/bin/phpcs --standard=phpcs.xml

format_fix:
	@./vendor/bin/phpcbf --standard=phpcs.xml