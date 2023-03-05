<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('surname', 100)->nullable(false);
            $table->string('name', 100)->nullable(false);
            $table->string('sex', 100)->nullable(false);
            $table->string('email', 100)->nullable(false);
            $table->string('post', 8)->nullable(false);
            $table->string('address', 100)->nullable(false);
            $table->string('building', 100)->nullable();
            $table->string('opinion', 120)->nullable(false);
            $table->timestamp('created_at')->useCurrent()->nullable();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inquiries');
    }
}
