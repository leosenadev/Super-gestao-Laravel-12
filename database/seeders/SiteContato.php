<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteContato extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        factory(SiteContatoFactory::class, 100)->create();
    }
}
