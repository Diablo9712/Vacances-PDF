dbrefresh:
	php artisan migrate:refresh
migrate:
	php artisan migrate
seed:
	php artisan db:seed --class=UsersTableSeeder
route:
	php artisan route:list
server:
	php artisan serve
cache:
	php artisan cache:clear
