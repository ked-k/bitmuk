<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->integer('sort');
            $table->string('name')->nullable();
            $table->text('content')->nullable();
            $table->string('background_color')->nullable();
            $table->string('blade');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });


        // Call seeder
        Artisan::call('db:seed', [
            '--class' => 'HomeSeeder',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homes');
    }
}
