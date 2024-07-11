<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('question_options')->insert([
            [
                'question_id' => 1,
                'label' => 'Normal',
                'icon' => null,
                'description' => 'Kulit terasa halus, tidak ada kulit yang mengelupas ataupun terlalu berminyak.',
            ],
            [
                'question_id' => 1,
                'label' => 'Kering',
                'icon' => null,
                'description' => 'Kadang kulit terasa kering ketarik. Sering dehidrasi dan timbul bercak kulit kering.',
            ],
            [
                'question_id' => 1,
                'label' => 'Berminyak',
                'icon' => null,
                'description' => 'Kulit terlihat berkilau dan berminyak saat disentuh.',
            ],
            [
                'question_id' => 1,
                'label' => 'Kombinasi',
                'icon' => null,
                'description' => 'Berminyak di bagian T-Zone tetapi normal atau kering di bagian pipi dan dagu.',
            ],
            [
                'question_id' => 1,
                'label' => 'Sensitif',
                'icon' => null,
                'description' => 'Kering dan gatal di beberapa area wajah. Mudah kemerahan dan kulit terkelupas.',
            ],
            [
                'question_id' => 2,
                'label' => 'Meningkatkan kelembapan kulit',
                'icon' => null,
                'description' => null,
            ],
            [
                'question_id' => 2,
                'label' => 'Menangkal tanda-tanda penuaan',
                'icon' => null,
                'description' => null,
            ],
            [
                'question_id' => 2,
                'label' => 'Bersih dari jerawat',
                'icon' => null,
                'description' => null,
            ],
            [
                'question_id' => 2,
                'label' => 'Warna kulit merata',
                'icon' => null,
                'description' => null,
            ],
            [
                'question_id' => 2,
                'label' => 'Memperbaiki pori-pori',
                'icon' => null,
                'description' => null,
            ],
            // [
            //     'question_id' => 3,
            //     'label' => 'Tidak ada sama sekali',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 3,
            //     'label' => '1 - 2 kali',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 3,
            //     'label' => '3 - 4 kali',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 3,
            //     'label' => 'Selalu ada jerawat',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 4,
            //     'label' => 'Kistik',
            //     'icon' => null,
            //     'description' => 'Benjolan besar, keras, merah dan berada jauh di dalam permukaan kulit biasanya berisi cairan putih, dan sakit kalau disentuh.',
            // ],
            // [
            //     'question_id' => 4,
            //     'label' => 'Pustula',
            //     'icon' => null,
            //     'description' => 'Benjolan besar, merah, dan tidak begitu keras. Biasanya, terdapat titik putih di tengah yang berisi cairan kuning atau putih.',
            // ],
            // [
            //     'question_id' => 4,
            //     'label' => 'Nodula',
            //     'icon' => null,
            //     'description' => 'Benjolan keras, besar, yang meradang, berada jauh di bawah permukaan kulit dan biasanya tidak memiliki cairan.',
            // ],
            // [
            //     'question_id' => 4,
            //     'label' => 'Komedo',
            //     'icon' => null,
            //     'description' => 'Benjolan merah cenderung kecil dengan titik putih di tengah.',
            // ],
            // [
            //     'question_id' => 5,
            //     'label' => 'Pipi dan bagian atas pipi',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 5,
            //     'label' => 'Dagu atau bagian bawah pipi',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 5,
            //     'label' => 'Hidung atau bagian atas bibir',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 5,
            //     'label' => 'Dahi',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 5,
            //     'label' => 'Di semua titik :(',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 6,
            //     'label' => 'Kemerahan dan ruam',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 6,
            //     'label' => 'Gatal',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 6,
            //     'label' => 'Kering dan terkelupas',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 6,
            //     'label' => 'Tidak, kulitku baik-baik saja',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 7,
            //     'label' => 'Eksim',
            //     'icon' => null,
            //     'description' => 'Kondisi kulit gatal, meradang, kemerahan, dan sering disertai ruam atau benjolan berisi cairan.',
            // ],
            // [
            //     'question_id' => 7,
            //     'label' => 'Rosacea',
            //     'icon' => null,
            //     'description' => 'Kulit panas kemerahan disertai bintik-bintik merah yang biasa muncul bersamaan dengan jerawat.',
            // ],
            // [
            //     'question_id' => 7,
            //     'label' => 'Psoriasis',
            //     'icon' => null,
            //     'description' => 'Mirip dengan eksim namun Psoriasis cenderung disertai dengan kulit bersisik.',
            // ],
            // [
            //     'question_id' => 7,
            //     'label' => 'Melasma',
            //     'icon' => null,
            //     'description' => 'Bercak kecokelatan pada kulit wajah akibat sinar matahari atau faktor hormonal.',
            // ],
            // [
            //     'question_id' => 7,
            //     'label' => 'Tidak ada',
            //     'icon' => null,
            //     'description' => 'Tidak ada kondisi kulit khusus.',
            // ],
            // [
            //     'question_id' => 8,
            //     'label' => 'Ekstrak rosmarin',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 8,
            //     'label' => 'Minyak kacang-kacangan',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 8,
            //     'label' => 'Ekstrak kacang kedelai',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 8,
            //     'label' => 'Aku punya alergi sebelumnya, tetapi kurang yakin apa penyebabnya',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 8,
            //     'label' => 'Tidak ada alergi sejauh ini',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 8,
            //     'label' => 'Lainnya',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 9,
            //     'label' => 'Tidak Pernah',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 9,
            //     'label' => 'Jarang',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 9,
            //     'label' => 'Sering',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 10,
            //     'label' => 'Tidak Pernah',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 10,
            //     'label' => 'Jarang',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 10,
            //     'label' => 'Sering',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 11,
            //     'label' => 'Tidak Pernah',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 11,
            //     'label' => 'Jarang',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 11,
            //     'label' => 'Sering',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 12,
            //     'label' => 'Kurang dari 1 jam',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 12,
            //     'label' => '1 - 3 jam',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 12,
            //     'label' => '4 - 6 jam',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 12,
            //     'label' => '7 - 8 jam',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 12,
            //     'label' => 'Lebih dari 8 jam',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 13,
            //     'label' => 'Antara jam 9 dan 11 malam',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 13,
            //     'label' => 'Antara jam 11 malam dan 1 pagi',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 13,
            //     'label' => 'Antara jam 1 dan 3 pagi',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 13,
            //     'label' => 'Setelah jam 3 pagi',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 14,
            //     'label' => 'Sepeda motor',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 14,
            //     'label' => 'Mobil',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 14,
            //     'label' => 'Bus umum',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 14,
            //     'label' => 'Kereta',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 14,
            //     'label' => 'Jalan kaki',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 14,
            //     'label' => 'Aku jarang bepergian',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 15,
            //     'label' => 'Vegetarian',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 15,
            //     'label' => 'Vegan',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 15,
            //     'label' => 'Ketotarian',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 15,
            //     'label' => 'Bebas susu',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 15,
            //     'label' => 'Bebas gluten',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 15,
            //     'label' => 'Pescatarian',
            //     'icon' => null,
            //     'description' => null,
            // ],
            // [
            //     'question_id' => 15,
            //     'label' => 'Aku tidak punya diet khusus
            //     ',
            //     'icon' => null,
            //     'description' => null,
            // ],
        ]);
    }
}
