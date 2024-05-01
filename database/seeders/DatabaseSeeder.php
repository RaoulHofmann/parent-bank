<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\AccountType;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->has(Account::factory()->count(1)->state([
                'name' => 'Jimmy Spending',
                'account_type_id' => AccountType::factory()->state(['name' => 'spending'])->create()->id,
            ]))
            ->has(Account::factory()->count(1)->state([
                'name' => 'Jimmy Savings',
                'account_type_id' => AccountType::factory()->state(['name' => 'savings'])->create()->id,
            ]))
            ->create([
                'name' => 'demo',
                'username' => 'demo',
                'email' => 'demo@668558.xyz',
                'password' => 'demo1234',
            ]);
    }
}
