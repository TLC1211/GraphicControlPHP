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
        Schema::create('v_strings', function (Blueprint $table) {
            $table->string('Guid', 40)->comment('全局唯一識別元')->primary();
            $table->string('Name', 191)->comment('元件名稱')->index();
            $table->string('Address', 191)->comment('元件地址')->index();
            $table->string('NowValue', 40)->comment('當下數值')->index();
            $table->tinyInteger('HandTrigger')->default(99)->comment('有人為操控時狀態')->index();
            $table->string('HandTriggerValue', 40)->default(99)->comment('人為操控切換後數值')->index();
            $table->longText('CollectData')->comment('數據集合');
            $table->tinyInteger('NotifyStatus')->comment('是否警示')->index();
            $table->longText('NotifyCollectData')->comment('數據集合');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('v_strings');
    }
};
