<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Book;
use Illuminate\Support\Str;
use Nette\Utils\Random;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 10; $i++){
            Book::create([
                'name' => Str::random(10),
                'author' => Str::random(10),
                'isbn' => random_int(10,10),
                'quantity' => random_int(0, 10),
                'price' => random_int(1, 100)
            ]);
        }
    }
}
