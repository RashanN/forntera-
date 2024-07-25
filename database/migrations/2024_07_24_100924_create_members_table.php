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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('day')->nullable();
            $table->string('table')->nullable();
            $table->string('colorcode')->nullable();
            $table->string('GCcode')->nullable();
            $table->string('SM')->nullable();
            $table->string('ASM')->nullable();
            $table->string('Territory_name')->nullable();
            $table->string('To_slab')->nullable();
            $table->string('Outlet_name')->nullable();
            $table->string('town')->nullable();
            $table->string('Dealername')->nullable();
            $table->string('DealerNic')->nullable();
            $table->string('Telephone')->nullable(); // This will be a string to accommodate numbers
            $table->string('transportrequired')->nullable();
            $table->string('busallocation')->nullable();
            $table->boolean('conform')->default(false); // Boolean with default value
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
