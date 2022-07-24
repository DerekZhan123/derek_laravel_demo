Project installation steps:

1.To install the php development environment,open the redis extension.

2.Change the vhosts configure to the specified directory (xx/laravel_demo/example-app/public) ,modify the host file.

3.Modify the database and redis connect configuration (.env) file.

4.Execute the command(php artisan migrate) to automatically generate the database table.

5.Enter the domain name to access.

================================================================

Some commands used in the development process:

1.composer 安装laravel
composer create-project laravel/laravel example-app


2.创建控制器
php artisan make:controller PostController   
php artisan make:controller UserController   

3.创建数据库迁移文件和model
php artisan make:migration create_posts_table
php artisan make:migration create_users_table
php  artisan make:model Post
php  artisan make:model User

4.修改migration文件
Schema::create('posts', function (Blueprint $table) {
          $table->id();
          $table->string('title');
          $table->text('body');
          $table->timestamps();
          $table->timestamp('published_at')->nullable();
      });

5.创建表
php artisan migrate 
php artisan migrate:fresh

6.Laravel安装redis 扩展包
composer require predis/predis

7.php 开启redis扩展
下载php dll扩展，重启apche

8.创建api
php artisan make:controller Api/AirticleController