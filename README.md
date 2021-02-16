# Hell Let Loose Pacific Exercise
Let's Exercise NOWWW!!!!

## Deployment
1. Clone repository
```bash
git clone https://github.com/vongola12324/hll-pacific-exercise
cd hll-pacific-exercise
```
2. Create `.env` file and fill the `APP_` field.
```bash
cp .env.example .env
vim .env
```
3. Install packages
```bash
composer install
yarn install
```
4. Generate Key
```bash
php artisan key:generate
```
5. Run Migration
```bash
php artisan migrate
```
6. Run the application
If you are in development environment, you can just start PHP server and node server to develop this project:
```bash
php artisan serve
yarn run watch-poll
```
If you are in production environment, please setup your web server, e.g., Nginx, and your database, e.g., MariaDB.
```bash
# Example
systemctl start nginx mariadb
```
