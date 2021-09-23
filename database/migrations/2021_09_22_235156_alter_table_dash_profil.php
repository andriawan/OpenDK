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
        $profil = Profil::find(1);
        $profil->nama_provinsi = DB::table('ref_wilayah')->where('provinsi_id', $profil->provinsi_id)->first()->nama;
        $profil->nama_kabupaten = DB::table('ref_wilayah')->where('kabupaten_id', $profil->kabupaten_id)->first()->nama;
        $profil->nama_kecamatan = DB::table('ref_wilayah')->where('kecamatan_id', $profil->kecamatan_id)->first()->nama;
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
