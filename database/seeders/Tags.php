<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Tags extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::create(['url' => 'sale', 'title' => 'Sales']);
        Tag::create(['url' => 'damaged', 'title' => 'With damage']);
        Tag::create(['url' => 'sport', 'title' => 'Sport cars']);
    }
}
