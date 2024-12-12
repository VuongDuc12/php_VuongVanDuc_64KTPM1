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
        Schema::create('sales', function (Blueprint $table) {
            $table->id('sale_id'); // Mã giao dịch
            $table->foreignId('medicine_id')->constrained('medicines')->onDelete('cascade'); // Khóa ngoại
            $table->integer('quantity'); // Số lượng bán
            $table->dateTime('sale_date'); // Ngày bán
            $table->string('customer_phone', 10)->nullable(); // Số điện thoại người mua (tùy chọn)
            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
