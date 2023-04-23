<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Database extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role',['Admin','system_admin','staff']);
            $table->timestamps();
        });

        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->integer('age')->nullable();
            $table->enum('sex', ['Nam', 'Nữ'])->nullable();
            $table->timestamps();
        });

        Schema::create('brands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('vehicle_infors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('licensePlates');
            $table->enum('type_vehicle', ['Xe số', 'Xe ga', 'Xe côn']);
            $table->integer('yearProduct')->nullable();
            $table->integer('frameNumber')->nullable();
            $table->string('color');
            $table->string('capacity');
            $table->unsignedBigInteger('brand_id');
            $table->string('model')->nullable();
            $table->integer('kmNumber')->nullable();
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
        });

        Schema::create('accessary_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('accessaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('accessary_group_id');
            $table->string('code');
            $table->string('name');
            $table->unsignedBigInteger('unit_id');
            $table->integer('price');
            $table->integer('import_price');
            $table->integer('quantity');
            $table->string('description');
            $table->timestamps();

            $table->foreign('accessary_group_id')->references('id')->on('accessary_groups')->onDelete('cascade');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
        });

        Schema::create('warehouse', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('accessary_id');
            $table->integer('import');
            $table->integer('export');
            $table->string('note')->nullable();
            $table->timestamps();

            $table->foreign('accessary_id')->references('id')->on('accessaries')->onDelete('cascade');
        });

        Schema::create('repairs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('vehicle_infor_id');
            $table->string('code');
            $table->enum('state', ['0', '1', '2']);
            $table->unsignedBigInteger('user_id');
            $table->timestamp('appointmentdate');
            $table->string('note')->nullable();
            $table->enum('service', ['Bảo dưỡng', 'Sửa chữa']);
            $table->string('vehicleCondition')->nullable();
            $table->string('customerRequest')->nullable();
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('vehicle_infor_id')->references('id')->on('vehicle_infors')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('repair_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('repair_id');
            $table->unsignedBigInteger('accessary_id');
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('repair_id')->references('id')->on('repairs')->onDelete('cascade');
            $table->foreign('accessary_id')->references('id')->on('accessaries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repair_detail');
        Schema::dropIfExists('repairs');
        Schema::dropIfExists('warehouse');
        Schema::dropIfExists('accessaries');
        Schema::dropIfExists('accessary_groups');
        Schema::dropIfExists('vehicle_infors');
        Schema::dropIfExists('units');
        Schema::dropIfExists('brands');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('users');
    }
}
