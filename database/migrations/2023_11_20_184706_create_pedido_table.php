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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments("id");
            $table->datetime("datapedido");
            $table->string("status",4);
            $table->unsignedBigInteger("usuario_id")->unsigned();
            $table->timestamps();

            $table->foreign("usuario_id")
            ->references("id")
            ->on("users")
            ->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
