<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHardwareDevicesTable extends Migration
{
    public function up()
    {
        Schema::create('hardware_devices', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('device_name'); // Tên thiết bị
            $table->string('type'); // Loại thiết bị
            $table->boolean('status'); // Trạng thái hoạt động
            $table->unsignedBigInteger('center_id'); // Khóa ngoại tham chiếu đến it_centers

            // Thiết lập khóa ngoại
            $table->foreign('center_id')->references('id')->on('it_centers')->onDelete('cascade');

            $table->timestamps(); // created_at và updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('hardware_devices');
    }
}
