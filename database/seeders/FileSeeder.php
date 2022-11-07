<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('files')->insert([
            ['filename'=>'archivo.pdf',
             'extension' => 'pdf',
             'url' => 'public/file'
            ],
            ['filename'=>'archivo2.pdf',
             'extension' => 'pdf',
             'url' => 'public/file'
            ],
            ['filename'=>'archivo3.pdf',
             'extension' => 'pdf',
             'url' => 'public/file'
            ],
            ['filename'=>'archivo4.pdf',
             'extension' => 'pdf',
             'url' => 'public/file'
            ],
        ]);
    }
}
