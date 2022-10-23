<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('ar_title');
            $table->string('en_title');
            $table->longText('ar_description');
            $table->longText('en_description');
            $table->enum('is_active',['active','inactive'])->default('inactive');
            $table->enum('type',['student','instructor'])->default('student');
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
        Schema::dropIfExists('faqs');
    }
}
