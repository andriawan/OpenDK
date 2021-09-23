<?php

use App\Models\Profil;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Schema\Blueprint;
use Database\Seeds\ConvertDataTableDasProfil;
use Illuminate\Database\Migrations\Migration;

class AlterTableDashProfil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('das_profil', function (Blueprint $table) {
            $table->string('nama_provinsi', 255)->after('provinsi_id');
            $table->string('nama_kabupaten', 255)->after('kabupaten_id');
            $table->string('nama_kecamatan', 255)->after('kecamatan_id');
        });

        // Isi data
        $data = Profil::where('kecamatan_id', config('app.default_profile'))->first();

        $profil = Profil::find(1);
        $profil->nama_provinsi = $data->nama_provinsi;
        $profil->nama_kabupaten = $data->nama_kabupaten;
        $profil->nama_kecamatan = $data->nama_kecamatan;
        $profil->update();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('nama_provinsi');
            $table->dropColumn('nama_kabupaten');
            $table->dropColumn('nama_kecamatan');
        });
    }
}
