.PHONY: all

all:
	php artisan migrate && \
    php artisan app:default-data-filler && \
    php artisan app:pal-file-fetch

