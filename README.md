1. Clone git project to your location of project hosting
2. Within the project folder run in the terminal the following commands in order:
    - composer install
    - npm install
3. clone the .env.example and rename it to .env
4. Fill in the following things in your .env
    - APP_URl
    - DB_DATABASE (database name)
    - DB_USERNAME
    - DB_PASSOWRD
5. Run the following commands in order
    - php artisan key:generate
    - php artisan migrate (It will ask if it should make the database. If it crashes, please make the database yourself)
    - php artisan db:seed (test data)
