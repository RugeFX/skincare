<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('questions')->insert([
            [
                'group' => 'kulit',
                'label' => 'skin_condition',
                'question' => 'Seperti apa kodisi kulitmu akhir-akhir ini?',
                'icon' => null,
                'order' => 1,
                'description' => null,
                'answer_type' => 'single'
            ],
            [
                'group' => 'kulit',
                'label' => 'skin_dream',
                'question' => 'Seperti apa kodisi kulitmu yang kamu inginkan?',
                'icon' => null,
                'order' => 2,
                'description' => null,
                'answer_type' => 'multiple'
            ],
        ]);
    }
}
