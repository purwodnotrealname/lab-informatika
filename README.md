# About this project
A project titled "Lab Informatika", original project: [labinformatika @razikdontcare](github.com/razikdontcare/labinformatika). Made using Laravel 12

# How to run
1. Clone this project.
2. Run: `composer install` and `npm install`.
3. Upon completed, copy .env.example and bring it to .env 
4. Run `php artisan key:generate`
5. Create a database with its name based on .env (you can change the content of .env file, of course)
6. Run the migration using `php artisan migrate`
7. Run `php artisan storage:link` to do symlink to storage
8. Run the project using `composer run dev` command to run `php artisan serve` and `npm run dev` concurrently.
