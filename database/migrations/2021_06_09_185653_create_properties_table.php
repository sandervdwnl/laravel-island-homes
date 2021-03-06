<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('street');
            $table->string('number');
            $table->string('zip_code');
            $table->string('city');
            $table->integer('asking_price');
            $table->string('status')->default('For Sale');
            $table->longText('description');
            $table->foreignId('location_id')->constrained('locations')->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('latitude', 8, 6);
            $table->decimal('longitude', 9, 6);
            $table->string('property_type');
            $table->integer('built_in');
            $table->integer('area_size_indoor');
            $table->integer('area_size_outdoor');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->string('feat_image_path')->nullable();
            $table->boolean('is_featured')->default(0);
            $table->boolean('approved')->default(0);
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
        $table->dropForeign(['user_id', 'location_id']);
        Schema::dropIfExists('properties');
       
    }
}
