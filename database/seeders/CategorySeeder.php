<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Kering',
                'tipe' => 'Kulit kering adalah kondisi kulit yang ditandai dengan rasa gatal, bersisik dan pecah-pecah. Kondisi kulit kering dapat terjadi pada siapapun, bahkan pada orang yang memiliki kulit berminyak sekalipun. Kulit kering dapat terjadi di area tubuh manapun seperti wajah, tangan, kaki, dan lengan.',
                'penyebab' => 'Kulit kering adalah kondisi kulit yang ditandai dengan rasa gatal, bersisik dan pecah-pecah. Kondisi kulit kering dapat terjadi pada siapapun, bahkan pada orang yang memiliki kulit berminyak sekalipun. Kulit kering dapat terjadi di area tubuh manapun seperti wajah, tangan, kaki, dan lengan.',
                'karakteristik' => json_encode([
                    'Kulit terasa kencang dan terlihat flaky',
                    'Pori-pori tidak terlihat',
                    'Terasa kering setelah membersihkan wajah',
                    'Kerut dan garis halus lebih terlihat,'
                ]),
                'skincare' => json_encode([
                    "Glycolic Acid",
                    "Hyaluronic Acid",
                    "Ceramides",
                    "PCA",
                    "Aloe Vera"
                ]),
            ],
            [
                'name' => 'Normal',
                'tipe' => "Orang dengan kulit normal biasanya tidak mendeskripsikan kulit mereka dengan kata-kata 'kering' atau berminyak. Bahkan ketika kulit terasa kering dan berminyak, biasanya sangat jarang terjadi dan mudah untuk menghilangkannya. Kulit normal bukan berarti kulit yang sempurna juga karena orang dengan kulit normal terkadang masih memiliki masalah jerawat meskipun tidak sering. Orang dengan kondisi kulit normal sebaiknya menghindari produk yang dapat menyebabkan kering dan terasa berminyak.",
                'penyebab' => null,
                'karakteristik' => json_encode([
                    'Warna kulit merata',
                    'Memiliki pori-pori dengan ukuran kecil dan tidak terlalu terlihat',
                    'Kandungan minyak di area T dan area lain di wajah seimbang',
                    'Memiliki permasalahan jerawat tapi hanya seasonal dan biasanya mudah diatasi',
                    'Tekstur kulit wajah yang halus dan lembut'
                ]),
                'skincare' => json_encode([
                    "AHA (Alpha Hydroxy Acid)",
                    "BHA (Beta Hydroxy Acid)",
                    "Aloe Vera",
                    "Hyaluronic Acid",
                    "Glycolic Acid,"
                ]),
            ],
            [
                'name' => 'Kombinasi',
                'tipe' => "Kulit kombinasi adalah tipe kulit yang memiliki dua atau lebih tipe kulit di kulitnya, dan biasanya ditandai dengan sebagian area kulit yang kering dan bersisik di sebagian wajah dan sebagian wajah lainnya berminyak. Banyak yang bilang mereka punya kulit berminyak, dimana pada kenyataannya punya kulit kombinasi.",
                'penyebab' => 'Genetis, Beberapa area di wajah punya kantung minyak yang lebih, aktif di area wajah lainnya, Penggunaan produk skin-care yang tidak tepat',
                'karakteristik' => json_encode([
                    'Pori-pori yang terlihat besar dari pada normal tapi tidak terlalu terlihat',
                    'Berminyak di area T-Zone (dahi, hidung dan dagu) dan kering di bagian pipi',
                    'Terdapat blackhead',
                ]),
                'skincare' => json_encode([
                    'Salicylic Acid',
                    'Silica',
                    'Niacinamide (Vitamin B3)',
                    'Hyaluronic Acid',
                    'Aloe Vera'
                ]),
            ],
            [
                'name' => 'Berminyak',
                'tipe' => "Buat kita yang lagi ada di usia 20an atau yang lagi mengalami masa puber, pasti nggak asing sama kulit berminyak. Kulit berminyak bisa terjadi karena faktor genetis dan perubahan hormonal, Biasanya orang yang memiliki kulit berminyak akan terlihat dari kulit wajahnya yang terlihat dewy atau mengilap.",
                'penyebab' => 'Orang dengan faktor genetis tertentu mempunyai kantung minyak yang lebih aktif dan memproduksi minyak lebih banyak untuk membantu membuat kulit tetap lembut dan terhidrasi. Beberapa penyebab oily skin yang harus kita tahu adalah: Genetis, Perubahan dan ketidakseimbangan hormone, Pengobatan, Stress, Comedogenic cosmetic',
                'karakteristik' => json_encode([
                    'Pori-pori yang terlihat besar',
                    'Kulit wajah terlihat mengilap, khususnya di Siang hari',
                    'Kulit berjerawat (terutama black head dan white head)',
                    'Makeup yang tidak tahan lama',
                ]),
                'skincare' => json_encode([
                    'Clay',
                    'White Cocoan',
                    'Aquainpool',
                    'Niacinamide (Vitamin B3)',
                ]),
            ],
        ]);
    }
}
