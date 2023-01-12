
1. Please run the following command to clone the project
  git clone https://github.com/aswathi-premaraj/ReferralSystem.git
2. Composer install

3. rename .env.example to .env and update DB_DATABASE ,DB_USERNAME,DB_PASSWORD etc

4. run migration command
   php artisan migrate

5. Added 'admin' throuh database seeder so run the command,
   php artisan db:seed

(Didnt removed vendor folder)