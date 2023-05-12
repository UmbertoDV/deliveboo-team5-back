<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name', 80);
            $table->string('surname', 80);
            $table->string('email', 80)->unique();
            $table->string('address');
            $table->string('telephone');
            $table->text('note')->nullable();
            $table->enum('status', ['Consegnato', 'In arrivo', 'In ritardo', 'Annullato']);
            $table->float('total')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
