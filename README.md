This is an API CRUD sample in Laravel 8.

How to use:

db_name: api 
db_password:""

For the db migration:
php artisan migrate

For Seeds execute:
php artisan db:seed --class=OfficesTableSeeder
php artisan db:seed --class=UsersTableSeeder

Passport installation (for authentication)
php artisan passport:install

Test login via postman:
URL: http://localhost:8000/api/offices/login
name: Admin
email: admin@email.com
password: apicrud

Testing via Postman:

Action:		Method:		URL:					            Authorization   	params:
List		GET		http://localhost:8000/api/offices	    bearer token
Get one		GET		http://localhost:8000/api/offices/1	    bearer token
Create		POST 	http://localhost:8000/api/offices   	bearer token   		name:test  address:aaaaa
Update		PUT		http://localhost:8000/api/offices/1	    bearer token		name:test  address:aaaaa
Delete		DELETE	http://localhost:8000/api/offices/50 	bearer token

Testing via phpunit:
If we execute phpunit it must pass all tests.
