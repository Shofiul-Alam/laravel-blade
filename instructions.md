# Setup mysql config 
As outlined in the Migrations guide to fix this all you have to do is edit your AppServiceProvider.php file and inside the boot method set a default string length:

use Illuminate\Support\Facades\Schema;

public function boot()
{
    Schema::defaultStringLength(191);
}

php artisan migrate 

## add a property in a migration 
 php artisan make:migration add_photo_id_to_users 



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

   #passing data to views from controller 

   return view('admin.users.index', compact('users'));


   #creating and building forms

   composer require laravelcollective/html

   https://laravelcollective.com/docs/5.2/html

   Next, add your new provider to the providers array of config/app.php:

  'providers' => [
    // ...
    Collective\Html\HtmlServiceProvider::class,
    // ...
  ],
   
   Finally, add two class aliases to the aliases array of config/app.php:

  'aliases' => [
    // ...
      'Form' => Collective\Html\FormFacade::class,
      'Html' => Collective\Html\HtmlFacade::class,
    // ...
  ]

  #code Snippte 

  Laravel 5 Snippet 
  Laravel Blade Snippte

  #Select elements Dynamic ones 
  {!! Form::select('status', array(1 => 'Active', 0 => 'Not Active'), 0, ['class' => 'form-control']) !!}

  ## From Database 
  $roles = Role::pluck('name', 'id')->all(); // Inside controller 
   {!! Form::select('role_id', ['' => 'Select Role'] + $roles, null, ['class' => 'form-control']) !!} // inside view 



# password and validation for form

## making request object
php artisan make:request UsersRequest 

add this object into the controller replace Request param object 


#Multipart Encrypt for photo upload

{!! Form::open(['method' => 'POST', 'action' => 'AdminUsersController@store', 'files' => true]) !!}

in app/config/filesystem 
add 

        ],    

        'images' => [  
            'driver' => 'local',  
            'root' => public_path('img'),  
            'visibility' => 'public',  
        ],


 $photo['filename'] = $request->file->store('');

            $photo['file'] = $this->imageRoot. '/' . $photo['filename'];

#route name as link in html 


#edit form model binding 
  {!! Form::model($user, ['method' => 'PATCH', 'action' => ['AdminUsersController@update', $user->id], 'files' => true]) !!} // in the view 


  ## in the controller 
  $user = User::findOrFail($id);  
        return view('admin.users.edit', compact('user', 'roles'));


  #Security Feature 
  Has to be Admin and active to get access to dashboard 

  #middleware 

  php artisan make:middleware 

  Register the middleware in app/http/kernel.php 


  
  



















   



