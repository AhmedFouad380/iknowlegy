<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('ar_title');
            $table->string('en_title');
            $table->longText('ar_description');
            $table->longText('en_description');
            $table->longText('ar_long_description');
            $table->longText('en_long_description');
            $table->integer('price')->default(0);
            $table->enum('is_discount',['active','inactive'])->default('inactive');
            $table->integer('discount_price')->default(0);
            $table->time('time')->nullable();
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->enum('is_active',['active','inactive'])->default('inactive');
            $table->enum('is_popular',['active','inactive']);
            $table->foreignId('instructor_id')->nullable()->constrained('instructors')->cascadeOnDelete();
            $table->foreignId('main_category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->foreignId('sub_category_id')->nullable()->constrained('sub_categories')->nullOnDelete();
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
        Schema::dropIfExists('courses');
    }
}
