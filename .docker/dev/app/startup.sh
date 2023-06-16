#!/bin/bash
php /var/www/html/api/artisan octane:start --server=swoole --host=0.0.0.0 --port=8000 --max-requests=1000 --watch & yarn dev -o
