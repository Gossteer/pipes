<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recordings', function (Blueprint $table) {
            $table->id();
            $table->date('date_recording');
            $table->tinyInteger('status')->default(0);
            $table->text('comment_customer')->nullable();
            $table->text('comment_admin')->nullable();
            $table->timestamps();

            $table->foreignId('user_id')->constrained('users')->onDelete('CASCADE');
            $table->foreignId('store_id')->constrained('stores')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recordings');
    }
}
