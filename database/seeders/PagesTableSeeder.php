<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pagesRecords = [
            [
                'id' => 1,
                'title' => 'Hakkımızda',
                'content' => '<p>This is home page body.</p>',
                'url'=>'hakkimizda',
                'meta_title'=>'Hakkımızda Sayfası',
                'meta_description'=>'Hakkımızda Sayfası meta açıklama',
                'meta_keywords'=>'Hakkımızda, Biz Kimiz, Bizi Tanıyın',
                'image'=>'/storage/photos/shares/photo1.png',
                'parent_id'=>0,
                'status'=>true
            ],
            [
                'id' => 2,
                'title' => 'Misyonumuz',
                'content' => '<p>Misyonumuz hakkında açıklama</p>',
                'url'=>'misyonumuz',
                'meta_title'=>'Misyonumuz Sayfası',
                'meta_description'=>'Misyonumuz Sayfası meta açıklama',
                'meta_keywords'=>'Misyon, Hedef',
                'image'=>'/storage/photos/shares/photo1.png',
                'parent_id'=>1,
                'status'=>true
            ],
            [
                'id' => 3,
                'title' => 'Vizyonumuz',
                'content' => '<p>Vizyonumuz hakkında açıklama</p>',
                'url'=>'vizyonumuz',
                'meta_title'=>'Vizyonumuz Sayfası',
                'meta_description'=>'Vizyonumuz Sayfası meta açıklama',
                'meta_keywords'=>'Vizyon, Amaç',
                'image'=>'/storage/photos/shares/photo1.png',
                'parent_id'=>1,
                'status'=>true
            ],
            [
                'id' => 4,
                'title' => 'Hizmetler',
                'content' => '<p>Hizmet hakkında açıklama</p>',
                'url'=>'hizmetler',
                'meta_title'=>'hizmet Sayfası',
                'meta_description'=>'hizmet Sayfası meta açıklama',
                'meta_keywords'=>'hizmet, Amaç',
                'image'=>'/storage/photos/shares/photo1.png',
                'parent_id'=>0,
                'status'=>true
            ]
        ];
        Page::insert($pagesRecords);
    }
}
