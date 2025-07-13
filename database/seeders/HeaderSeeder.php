<?php

namespace Database\Seeders;

use App\Models\Header;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'title'     => "عنوان الهيدر رقم $i",
                'paragraph' => "هذه نبذة تعريفية طويلة للهيدر رقم $i تعرض خدمات الشركة بشكل مفصل وجذاب.
                                نحرص على تقديم أفضل الحلول لعملائنا الكرام مع التزامنا بأعلى معايير الجودة والاحترافية.
                                كما نقدم خدمات استشارية وتقنية مبتكرة تناسب كافة احتياجات السوق وتساهم في تطوير الأعمال.",
                'image'     => "allimg/header$i.jpg",
            ];
        }

        Header::insert($data);
    }
}
