<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DevelopmentData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $path_article = resource_path('data/articles.csv');
        $path_articlecategory = resource_path('data/articlecategory.csv');
        $path_user = resource_path('data/user.csv');

        $file_article = fopen($path_article, 'r');
        $file_articlecategory = fopen($path_articlecategory, 'r');
        $file_user = fopen($path_user, 'r');

        if( !$file_user || !$file_article || !$file_articlecategory ) return;

        var_dump(fgetcsv($file_article, 1000, ';'));//remove header
        DB::table('ab_article')->truncate(); // clear table

        while(($row = fgetcsv($file_article, 1000, ';') )!== false) {
            DB::table('ab_article')->insert([
                'id' => $row[0],
                'ab_name' => $row[1],
                'ab_price' => (int)($row[2]*100),
                'ab_description' => $row[3],
                'ab_creator_id' => $row[4],
                'ab_createdate' => $row[5]
            ]);
        }

        var_dump(fgetcsv($file_articlecategory, 1000, ';')); //remove header
        DB::table('ab_articlecategory')->truncate(); // clear table

        while(($row = fgetcsv($file_articlecategory, 1000, ';')) !== false) {
            DB::table('ab_articlecategory')->insert([
                'id' => $row[0],
                'ab_name' => $row[1],
                'ab_description' => null,
                'ab_parent' => $row[2] == 'NULL'? null: $row[2]
            ]);
        }

        var_dump(fgetcsv($file_user, 1000, ';')); //remove header
        DB::table('ab_user')->truncate(); // clear table
        while(($row = fgetcsv($file_user, 1000, ';')) !== false) {
            DB::table('ab_user')->insert([
                'id' => $row[0],
                'ab_name' => $row[1],
                'ab_password' => $row[2],
                'ab_mail' => $row[3],
            ]);
        }
        fclose($file_article);
        fclose($file_articlecategory);
        fclose($file_user);
    }
}
