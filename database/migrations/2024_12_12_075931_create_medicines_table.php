<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id('medicine_id'); // Mã thuốc
            $table->string('name', 255); // Tên thuốc
            $table->string('brand', 100)->nullable(); // Thương hiệu (tùy chọn)
            $table->string('dosage', 50); // Liều lượng
            $table->string('form', 50); // Dạng thuốc
            $table->decimal('price', 10, 2); // Giá thuốc
            $table->integer('stock'); // Số lượng tồn kho
            $table->timestamps(); // created_at và updated_at
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
