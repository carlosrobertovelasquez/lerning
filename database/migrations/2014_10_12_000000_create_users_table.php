<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'roles',function(blueprint $table){
           $table->increments('id');
           $table->string('name')->comment('Nombre del rol de usuario');
           $table->text('descripcion');
           $table->timestamps();
            });
        Schema::create('users', function (Blueprint $table) {
                $table->Increments('id');
                $table->unsignedInteger('role_id')->default(\App\Role::STUDENT);
                $table->foreign('role_id')->references('id')->on('roles');
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password');
                $table->rememberToken();
                $table->string('picture')->nullable();
                $table->timestamps();
            
            });
            
            
            Schema::create('user_social_accounts', function (Blueprint $table) {
                $table->Increments('id');
                $table->unsignedInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users');
                $table->string('provider');
                $table->string('provider_uid');        
                $table->timestamps();
            });  

           

    
        } 

        
        
        

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('subscriptions');
        Schema::dropIfExists('user_social_accounts');
    }
}
