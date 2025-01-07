How To Try This Website 

- Change the branch "main" to "master"
- Import this data (resepkitaherd.sql)
- Open web file, and run "php artisan serve"

- I used 2 role, 1 user and 1 admin.

for admin login change:
1. authcheck in app/Http/Middleware/isAdmin and change number 1 with your id (you have to check in database) 
2. the dropdown menu in resources/views/layouts/navbar.blade.php. find line "@if(auth()->check() && auth()->user()->id === 1" change number 1 with your id

Admin Features : See and download data all user
                 See, delete, and download all recipes
