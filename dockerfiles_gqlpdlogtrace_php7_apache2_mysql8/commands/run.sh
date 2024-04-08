#!/bin/bash


rm -f /var/www/html/composer.lock;
cp /home/commands/doctrine.local.php /var/www/html/dev/config/
chmod -R a+w /var/www/html/data;
php /home/commands/init-database.php;
cd /var/www/html;
composer install --no-interaction
/var/www/html/vendor/bin/doctrine orm:schema-tool:update --force
php /home/commands/init-database-data.php;
apache2-foreground
