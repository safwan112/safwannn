<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSearchQueriesTable extends Migration
{
    public function up()
    {
        Schema::create('search_queries', function (Blueprint $table) {
            $table->id(); // This will auto-increment and serve as a primary key
            $table->string('query')->unique();
            $table->integer('search_count')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('search_queries');
    }
}
