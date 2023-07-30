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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('type');
            $table->string('target');
            $table->smallInteger('year_built');
            $table->integer('price');
            $table->tinyInteger('bedrooms');
            $table->tinyInteger('bathrooms');
            $table->integer('area');
            $table->string('city');
            $table->string('address');
            $table->string('contact_name');
            $table->string('contact_email');
            $table->string('contact_phone');
            $table->boolean('status');
            $table->foreignIdFor(Company::class)->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
