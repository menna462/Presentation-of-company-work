<?php

namespace Database\Seeders;

use App\Models\Teamwork;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teamData = [];
        for ($i = 1; $i <= 10; $i++) {
            $teamData[] = [
                'title'     => "اسم الفريق رقم $i",
                'paragraph' => "هذا وصف مفصل لعضو الفريق رقم $i يشرح دوره ومسؤولياته داخل الشركة بشكل احترافي ويوضح الخبرات والمهارات التي يمتلكها.",
                'image'     => "allimg/team$i.jpg",
            ];
        }
        Teamwork::insert($teamData);
    }
}
