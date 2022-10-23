<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('ar_title');
            $table->string('en_title');
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->enum('is_active',['active','inactive'])->default('inactive');
            $table->enum('is_popular',['active','inactive']);
            $table->foreignId('created_by')->nullable()->constrained('admins')->restrictOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('admins')->restrictOnDelete();
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
        Schema::dropIfExists('categories');
    }
}
