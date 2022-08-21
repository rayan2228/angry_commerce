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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string("brand_name")->unique();
            $table->string("brand_slug");
            $table->string("brand_image")->nullable();
            $table->longText("brand_description")->nullable();
            $table->string("brand_type")->default('normal');
            $table->boolean("brand_status")->default('1');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
};
