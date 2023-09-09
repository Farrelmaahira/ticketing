<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Report::create([
            'user_id' => '2',
            'title' => '[CONTOH] Ini Title',
            'description' => '[CONTOH] Ini Deskripsi',
            'category_id' => '1'
        ]);
    }
}
