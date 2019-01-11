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


