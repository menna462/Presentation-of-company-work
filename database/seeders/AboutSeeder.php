<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $data = [];

        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'title'     => "عنوان من نحن رقم $i",
                'paragraph' => "هذا وصف تفصيلي طويل للقسم 'من نحن' رقم $i يشرح أهداف ورؤية الشركة
                                والخدمات التي نقدمها بشكل دقيق. نحرص على تقديم أفضل الحلول المبتكرة التي تلبي تطلعات عملائنا
                                وتضمن رضاهم التام عن الخدمات المقدمة مع الحرص على الجودة والالتزام بالمواعيد.",
                'image'     => "allimg/about$i.jpg",
            ];
        }

        About::insert($data);
    }
}
