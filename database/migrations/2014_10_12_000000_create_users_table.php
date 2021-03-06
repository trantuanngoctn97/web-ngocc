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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('phone')->unique()->nullable();
            $table->string('images')->nullable();
            // $table->unsignedInteger('level');
            $table->string('password');
            $table->string('email')->unique()->nullable();
            $table->string('address')->nullable();
            $table->boolean('verified')->default(false);
            $table->string('verification_code')->nullable();
            $table->date('verified_at')->nullable();
            $table->enum('status',[0, 1, 2])->default(1);
            // 0: Tạm dừng hoạt động, 1: Đang hoạt động, 2: Dừng hoạt động

            // Đăng nhập bằng MXH
            $table->string('provider_id')->nullable();
            $table->string('provider')->nullable();
            
            $table->rememberToken();
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
    }
}
