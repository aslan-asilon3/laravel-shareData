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

            $table->string('name');
            $table->text('heading');
            $table->string('color'); //return $this->hasMany(App\Models\ProductColor::class);
            $table->string('size'); // return $this->hasMany(App\Models\ProductSize::class);
            $table->integer('price');
            $table->integer('stock');
            $table->integer('buy');
            $table->integer('sell');
            $table->string('batch');
            $table->string('status')->default('onsale');
            $table->text('description');
            $table->text('comment');
            $table->text('rating');
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
