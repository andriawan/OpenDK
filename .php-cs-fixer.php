<?php

declare(strict_types=1);

$tahun = date('Y');

$header = <<<EOF
File ini bagian dari:

PBB Desa

Aplikasi dan source code ini dirilis berdasarkan lisensi GPL V3

Hak Cipta 2016 - $tahun Perkumpulan Desa Digital Terbuka (https://opendesa.id)

Dengan ini diberikan izin, secara gratis, kepada siapa pun yang mendapatkan salinan
dari perangkat lunak ini dan file dokumentasi terkait ("Aplikasi Ini"), untuk diperlakukan
tanpa batasan, termasuk hak untuk menggunakan, menyalin, mengubah dan/atau mendistribusikan,
asal tunduk pada syarat berikut:

Pemberitahuan hak cipta di atas dan pemberitahuan izin ini harus disertakan dalam
setiap salinan atau bagian penting Aplikasi Ini. Barang siapa yang menghapus atau menghilangkan
pemberitahuan ini melanggar ketentuan lisensi Aplikasi Ini.

PERANGKAT LUNAK INI DISEDIAKAN "SEBAGAIMANA ADANYA", TANPA JAMINAN APA PUN, BAIK TERSURAT MAUPUN
TERSIRAT. PENULIS ATAU PEMEGANG HAK CIPTA SAMA SEKALI TIDAK BERTANGGUNG JAWAB ATAS KLAIM, KERUSAKAN ATAU
KEWAJIBAN APAPUN ATAS PENGGUNAAN ATAU LAINNYA TERKAIT APLIKASI INI.

@package	    OpenDK
@author	    Tim Pengembang OpenDesa
@copyright	Hak Cipta 2016 - $tahun Perkumpulan Desa Digital Terbuka (https://opendesa.id)
@license    	http://www.gnu.org/licenses/gpl.html    GPL V3
@link	    https://github.com/OpenSID/opendk
EOF;

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude([
        'bootstrap',
        'database', // Timeout
        'public',
        'storage',
        'test',
        'vendor',
    ])
    ->name('*.php')
    ->name('_ide_helper')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

$config = new PhpCsFixer\Config();
return $config->setRules([
        '@PSR12' => true,
        'array_syntax' => ['syntax' => 'short'],
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
        'no_unused_imports' => true,
        'header_comment' => ['header' => $header],
    ])
    ->setUsingCache(false)
    ->setLineEnding(PHP_EOL)
    ->setFinder($finder);