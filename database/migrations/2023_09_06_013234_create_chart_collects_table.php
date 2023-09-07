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
        Schema::create('chart_collects', function (Blueprint $table) {
            $table->string('Guid', 40)->comment('全局唯一識別元')->primary();
            $table->string('Address', 191)->comment('元件地址集合')->index();
            $table->longText('Data')->comment('數據集合');
            $table->longText('Collect')->comment('參數集合');
            $table->text('Remark')->comment('備注');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chart_collects');
    }
};
