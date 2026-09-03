<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::create('offers', function (Blueprint $table) {

        $table->id();

        $table->string('offer_number');

        //Cada oferta pertenece a un curso existente.
        $table->foreignId('course_id')
              ->constrained('courses')
              ->onDelete('cascade');
    
        //Cada oferta pertenece a un centro de formación existente.
        $table->foreignId('training_center_id')
              ->constrained('training_centers')
              ->onDelete('cascade');

        $table->string('day');

        $table->date('start_date');

        $table->date('end_date');

        $table->string('modality');

        $table->integer('quota');

        $table->integer('available_quota');

        $table->string('status')->default('Activa');

        $table->string('image_url')->nullable();

        $table->timestamps();
    });
}
};
