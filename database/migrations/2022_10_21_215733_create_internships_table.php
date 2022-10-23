<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internships', function (Blueprint $table) {
            $table->id();
            $table->string('ar_title');
            $table->string('en_title');
            $table->string('ar_company')->nullable();
            $table->string('en_company')->nullable();
            $table->longText('ar_description')->nullable();
            $table->longText('en_description')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('city_id')->constrained('careers_cities')->restrictOnDelete();
            $table->foreignId('category_id')->constrained('careers_categories')->restrictOnDelete();
            $table->enum('is_active',['active','inactive'])->default('inactive');
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
        Schema::dropIfExists('internships');
    }
}
