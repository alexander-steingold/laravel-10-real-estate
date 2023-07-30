<?php

use App\Models\Company;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('type');
            $table->string('target');
            $table->smallInteger('year_built');
            $table->integer('price')->nullable();
            $table->tinyInteger('bedrooms');
            $table->tinyInteger('bathrooms');
            $table->integer('area')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->date('available_from')->nullable();
            $table->boolean('status')->nullable();
            $table->boolean('air_condition')->nullable();
            $table->boolean('balcony')->nullable();
            $table->boolean('free_parking')->nullable();
            $table->boolean('central_heating')->nullable();
            $table->boolean('window_covering')->nullable();
            $table->boolean('security')->nullable();
            $table->boolean('gym')->nullable();
            $table->boolean('alarm')->nullable();
            $table->boolean('garage')->nullable();
            $table->boolean('swimming_pool')->nullable();
            $table->boolean('laundry_room')->nullable();
            $table->boolean('wifi')->nullable();
            $table->foreignIdFor(Company::class)->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
