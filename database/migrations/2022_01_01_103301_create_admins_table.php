<?php

use App\Models\admin;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('type')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('password');
            $table->timestamps();
        });

        $data = admin::find(1);
        if (empty($data)) {
            $admin = new Admin();
            $admin->name = 'admin';
            $admin->email = 'admin@tdevs.co';
            $admin->type = 'admin';
            $admin->password = Hash::make('12345678');
            $admin->save();
        }


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
