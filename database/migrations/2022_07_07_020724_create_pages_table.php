<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('ar_title');
            $table->string('en_title');
            $table->string('slug')->nullable();
            $table->longText('ar_description');
            $table->longText('en_description');
            $table->string('image')->nullable();
            $table->enum('is_active',['active','inactive'])->default('inactive');
            $table->enum('type',['header','footer'])->default('header');
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
        Schema::dropIfExists('pages');
    }
}
