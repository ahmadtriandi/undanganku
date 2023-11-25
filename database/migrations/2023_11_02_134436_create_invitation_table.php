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
        Schema::create('invitation', function (Blueprint $table) {
            $table->integer("id_invitation")->autoIncrement();
            $table->string("qrcode_invitation", 10)->unique();
            $table->string("table_number_invitation", 20)->nullable();
            $table->enum('type_invitation', ['reguler', 'vip']);
            $table->string("information_invitation")->nullable();
            $table->string("link_invitation", 150)->nullable();
            $table->string("image_qrcode_invitation", 200)->nullable();
            $table->boolean('send_email_invitation')->default(FALSE);
            $table->string("checkin_img_invitation")->nullable();
            $table->string("checkout_img_invitation")->nullable();
            $table->timestamp('checkin_invitation')->nullable();
            $table->timestamp('checkout_invitation')->nullable();
            $table->integer("id_guest");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitation');
    }
};
