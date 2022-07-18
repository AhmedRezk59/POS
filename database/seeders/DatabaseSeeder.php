<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call([
            LaratrustSeeder::class,
            UsersTableSeeder::class,
            // CategoryTableSeeder::class,
            // SizesTableSeeder::class,
            // ProductsTableSeeder::class,
            // InvoiceTableSeeder::class,
        ]);
    }
}
