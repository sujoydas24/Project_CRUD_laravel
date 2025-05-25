1. Laravel Version used Laravel 12
2. Setup instraction:
   ->**Clone the repository:**
       git clone https://github.com/your-username/your-repo-name.git
       cd your-repo-name
   -> copy .env file
   -> Generate application key:
        php artisan key:generate
   -> Configure the database in .env
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_DATABASE=project_crud
    -> Run database migrations
        php artisan migrate
    -> Create a symbolic link for image uploads:
        php artisan storage:link
    -> Run in the local development server:
        php artisan serve
4. Database name used project_crud
5. Additional notes:
   -> Uploaded project images are stored in storage/app/public/images.
   -> The frontend uses Bootstrap 5 for responsiveness and styling.
   -> Only JPG, PNG, JPEG, and GIF image formats are allowed (max 2MB).
   -> Status field accepts only Draft or Published.
