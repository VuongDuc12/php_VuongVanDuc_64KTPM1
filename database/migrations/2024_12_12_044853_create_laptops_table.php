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
        Schema::create('laptops', function (Blueprint $table) {
            $table->id(); // Tạo cột id tự tăng
            $table->string('brand'); // Hãng sản xuất laptop
            $table->string('model'); // Mẫu laptop
            $table->string('specifications'); // Thông số kỹ thuật
            $table->boolean('rental_status'); // Trạng thái cho thuê
            $table->foreignId('renter_id')->constrained('renters'); // Khóa ngoại đến bảng renters
            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laptops');
    }
};
