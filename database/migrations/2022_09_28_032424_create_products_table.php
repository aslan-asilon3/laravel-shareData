<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();

            $table->string('name')->nullable();
            $table->text('heading')->nullable();
            $table->string('color')->nullable(); //return $this->hasMany(App\Models\ProductColor::class);
            $table->string('size')->nullable(); // return $this->hasMany(App\Models\ProductSize::class);
            $table->integer('price')->nullable();
            $table->integer('stock')->nullable();
            $table->integer('buy')->nullable();
            $table->integer('sell')->nullable();
            $table->string('batch')->nullable(); // return $this->hasMany(App\Models\ProductSize::class);
            $table->string('status')->nullable()->default('onsale');
            $table->text('description')->nullable();
            $table->text('comment')->nullable();
            $table->text('rating')->nullable();
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
