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
        Schema::create('pqrs', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("apellido");
            $table->string("correo");
            $table->enum("tipo",["Queja","Petición", "Felicitación"]);
            $table->text("mensaje");
            $table->boolean("estado")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations. falta migrar
     */
    public function down(): void
    {
        Schema::dropIfExists('pqrs');
    }
};
