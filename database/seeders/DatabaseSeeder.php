<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Medicines;
use App\Models\Transaction;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\TransactionDetail;
use App\Models\MedicineDescription;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([CategorySeeder::class,UserSeeder::class]);

        TransactionDetail::factory(10)->recycle([
            Medicines::factory(25)->recycle(Category::all())->create(),
            Transaction::factory(15)->recycle([
                User::all(),
                User::factory(8)->create()
            ])->create()
        ])->create();

        MedicineDescription::factory(8)->create();

    }
}
