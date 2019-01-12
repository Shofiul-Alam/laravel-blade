# Setup mysql config 
As outlined in the Migrations guide to fix this all you have to do is edit your AppServiceProvider.php file and inside the boot method set a default string length:

use Illuminate\Support\Facades\Schema;

public function boot()
{
    Schema::defaultStringLength(191);
}

php artisan migrate 



# Auth configure
php artisan make:auth

## this will create signin or Registration controller and views. 


#Add foreign key and properties in migration 
    $table->integer('role_id')->index()->unsigned()->nullable;

    $table->integer('is_active')->default(0);


#Create Model with migration 
php artisan make:model Role -m 


#Tinker console run commad to check object relationship, DB etc
php artisan tinker

App\User::find(1)

#Create controller  with resources 
php artisan make:controller --resource AdminUsersController

#Compress CSS, JS etc

npm install 

## edit webpack.mix.js
mix.js('resources/js/app.js', 'public/js')  
   .sass('resources/sass/app.scss', 'public/css')  
   .styles([  
      'resources/assets/css/libs/blog-post.css',
      'resources/assets/css/libs/bootstrap.css',
      'resources/assets/css/libs/font-awesome.css',
      'resources/assets/css/libs/metisMenu.css',
      'resources/assets/css/libs/sb-admin-2.css',
      'resources/assets/css/libs/styles.css',
   ],   
   'public/css/lib.css')


   .scripts([  
      'resources/assets/js/libs/jquery.js',  
      'resources/assets/js/libs/bootstrap.js',
      'resources/assets/js/libs/metisMenu.js',
      'resources/assets/js/libs/sb-admin-2.js',
      'resources/assets/js/libs/scripts.js',
   ], 
   'public/js/lib.js');


   #Master layout for Admin 
   Create admin.blade.php in Resources/Layout folder

   



