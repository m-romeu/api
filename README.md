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
Authorization: bearer token 

Action:		Method:		URL:

List		GET		http://localhost:8000/api/offices	    
Get one		GET		http://localhost:8000/api/offices/1	    
Create		POST 	http://localhost:8000/api/offices   
Update		PUT		http://localhost:8000/api/offices/1	  
Delete		DELETE	http://localhost:8000/api/offices/50 	

Testing via phpunit:
If we execute phpunit it must pass all tests.
