<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('group_id')->nullable();
            $table->integer('category_id');
            $table->double('price');
            $table->integer('qty')->nullable();
            $table->integer('sold')->nullable();
            $table->integer('islamic')->default(0);
            $table->integer('offer')->default(0);
            $table->string('isbn_no')->nullable();
            $table->integer('admin_id')->default(1);
            $table->integer('author_id');
            $table->tinyInteger('publication_id')->nullable();
            $table->string('publication_status')->default(1);
            $table->string('image');
            $table->text('description')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('products');
    }
}
