<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class ArticleHasCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        //
        $path_ahc = resource_path('data/article_has_articlecategory.csv');
        $file_ahc = fopen($path_ahc, 'r');
        if (!$file_ahc) {
            return;
        }
        else{
            //remove header
            var_dump(fgetcsv($file_ahc,1000, ';'));
            //clear table
            DB::table('ab_article_has_category')->truncate();
            while(($row = fgetcsv($file_ahc, 1000, ';')) !== false){
                DB::table('ab_article_has_category')->insert([
                    'ab_category_id' => (int)$row[0],
                    'ab_article_id' => (int)$row[1]
                ]);
            }
            fclose($file_ahc);
        }
    }
}
