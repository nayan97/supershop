<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('running_tag') ->nullable();
            $table->string('email') ->nullable();
            $table->string('cell') ->nullable();
            $table->string('address') ->nullable();
            $table->string('copyright');
            $table->text('social');
            $table->boolean('search') -> default(false);
            $table->string('title');
            $table->string('tagline');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('themes');
    }
};
