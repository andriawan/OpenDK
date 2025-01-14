<?php

/*
 * File ini bagian dari:
 *
 * PBB Desa
 *
 * Aplikasi dan source code ini dirilis berdasarkan lisensi GPL V3
 *
 * Hak Cipta 2016 - 2021 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 *
 * Dengan ini diberikan izin, secara gratis, kepada siapa pun yang mendapatkan salinan
 * dari perangkat lunak ini dan file dokumentasi terkait ("Aplikasi Ini"), untuk diperlakukan
 * tanpa batasan, termasuk hak untuk menggunakan, menyalin, mengubah dan/atau mendistribusikan,
 * asal tunduk pada syarat berikut:
 *
 * Pemberitahuan hak cipta di atas dan pemberitahuan izin ini harus disertakan dalam
 * setiap salinan atau bagian penting Aplikasi Ini. Barang siapa yang menghapus atau menghilangkan
 * pemberitahuan ini melanggar ketentuan lisensi Aplikasi Ini.
 *
 * PERANGKAT LUNAK INI DISEDIAKAN "SEBAGAIMANA ADANYA", TANPA JAMINAN APA PUN, BAIK TERSURAT MAUPUN
 * TERSIRAT. PENULIS ATAU PEMEGANG HAK CIPTA SAMA SEKALI TIDAK BERTANGGUNG JAWAB ATAS KLAIM, KERUSAKAN ATAU
 * KEWAJIBAN APAPUN ATAS PENGGUNAAN ATAU LAINNYA TERKAIT APLIKASI INI.
 *
 * @package	    OpenDK
 * @author	    Tim Pengembang OpenDesa
 * @copyright	Hak Cipta 2016 - 2021 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 * @license    	http://www.gnu.org/licenses/gpl.html    GPL V3
 * @link	    https://github.com/OpenSID/opendk
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

use function sprintf;

class Wilayah extends Model
{
    /** @var string konstan panjang kode */
    public const PROVINSI  = 2;
    public const KABUPATEN = 5;
    public const KECAMATAN = 8;
    public const DESA      = 13;

    protected $primaryKey = 'kode';

    protected $keyType = 'string';

    public $incrementing = false;

    public $table = 'ref_wilayah';

    protected $fillable = ['kode', 'nama', 'tahun'];

    /**
     * Scope query untuk menampilkan hanya provinsi.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeProvinsi($query)
    {
        return $query->whereRaw(sprintf('LENGTH(kode) = %s', static::PROVINSI));
    }

    /**
     * Scope query untuk menampilkan hanya kabupaten.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeKabupaten($query)
    {
        return $query->whereRaw(sprintf('LENGTH(kode) = %s', static::KABUPATEN));
    }

    /**
     * Scope query untuk menampilkan hanya kecamatan.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeKecamatan($query)
    {
        return $query->whereRaw(sprintf('LENGTH(kode) = %s', static::KECAMATAN));
    }

    /**
     * Scope query untuk menampilkan hanya desa.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeDesa($query)
    {
        return $query->whereRaw(sprintf('LENGTH(kode) = %s', static::DESA));
    }

    /**
     * Scope query untuk menampilkan desa berdaskan id kecamatan.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeGetDesaByKecamatan($query, $kecamatan_id)
    {
        return $query->where('kode', 'LIKE', "%{$kecamatan_id}%");
    }
}
