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
        Schema::create('grounds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->string('latitude');
            $table->string('logitude');
            $table->boolean('ispopular');
            $table->string('baseprice');
            $table->enum('discounttype',['percentage', 'fix'])->default('percentage');
            $table->string('discountprice');
            $table->time('openat');
            $table->time('closeat');
            // $table->string('category');
            $table->boolean('isactive');
            // $table->foreignId('category_id')
            //     ->constrained()
            //     ->cascadeOnDelete();
            $table->foreignId('vendor_id')
                ->constrained()
                ->cascadeOnDelete();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grounds');
    }
};
