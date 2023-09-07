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
        Schema::create('chart_values', function (Blueprint $table) {
            $table->string('Guid', 40)->comment('全局唯一識別元')->primary();
            $table->string('ChartCollectsGuid', 40)->comment('圖表設定唯一碼')->index();
            $table->integer('TimeStamp', false, true)->comment('當下秒數')->index();
            $table->longText('Collect')->comment('數據集合');
            $table->timestamps();
            $table->index(['ChartCollectsGuid', 'TimeStamp']);
            $table->index(['updated_at', 'TimeStamp']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chart_values');
    }
};
