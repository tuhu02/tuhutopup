<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMissingColumnsToLayananPpobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('layanan_ppobs', function (Blueprint $table) {
            if (!Schema::hasColumn('layanan_ppobs', 'harga_reseller')) {
                $table->bigInteger('harga_reseller')->after('harga');
            }
            if (!Schema::hasColumn('layanan_ppobs', 'provider')) {
                $table->string('provider')->nullable()->after('status');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('layanan_ppobs', function (Blueprint $table) {
            if (Schema::hasColumn('layanan_ppobs', 'harga_reseller')) {
                $table->dropColumn('harga_reseller');
            }
            if (Schema::hasColumn('layanan_ppobs', 'provider')) {
                $table->dropColumn('provider');
            }
        });
    }
}
