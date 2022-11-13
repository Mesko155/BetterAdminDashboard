<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('practice_id')
                ->constrained('practices')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('firstname')
                ->required();
            $table->string('lastname')
                ->required();
            $table->string('email')
                ->unique()
                ->nullable();
            $table->string('phone')
                ->unique()
                ->nullable();
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
        Schema::dropIfExists('employees');
    }
};
