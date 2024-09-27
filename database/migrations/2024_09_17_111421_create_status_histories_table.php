<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('status_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enrollment_id')->constrained()->onDelete('cascade');
            $table->string('status');
            $table->text('notes')->nullable(); // Optional notes field
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('status_histories');
    }
}
