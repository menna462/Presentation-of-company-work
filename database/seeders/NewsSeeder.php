<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newsData = [];
        for ($i = 1; $i <= 10; $i++) {
            $newsData[] = [
                'title'     => "عنوان الخبر رقم $i",
                'paragraph' => "هذا نص طويل يشرح تفاصيل الخبر رقم $i بشكل وافٍ يضمن جذب القارئ ويقدم معلومات دقيقة وواضحة عن آخر إنجازات الشركة أو أخبارها.",
                'image'     => "allimg/news$i.jpg",
            ];
        }
        News::insert($newsData);
    }
}
