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
        Schema::table('orders', function (Blueprint $table) {

        $table->enum('order_type', ['delivery', 'pickup'])
              ->default('delivery')
              ->after('user_id');

        $table->string('phone')
              ->nullable()
              ->after('order_type');

        $table->text('address')
              ->nullable()
              ->after('phone');

        $table->text('notes')
              ->nullable()
              ->after('address');

        $table->enum('payment_method', ['cod', 'online'])
              ->default('cod')
              ->after('notes');

        $table->enum('payment_status', ['pending', 'paid', 'failed'])
              ->default('pending')
              ->after('payment_method');
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
            'order_type',
            'phone',
            'address',
            'notes',
            'payment_method',
            'payment_status'
        ]);

            //
        });
    }
};
