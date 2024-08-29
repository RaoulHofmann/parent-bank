<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\AccountType;
use App\Models\DestinationType;
use App\Models\Transaction;
use App\Models\TransactionType;
use App\Models\User;
use Database\Factories\DestinationTypeFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()
            ->has(Account::factory()->count(1)->state([
                'name' => 'Jimmy Spending',
                'amount' => 100,
                'account_type_id' => AccountType::factory()->state(['type' => 'spending'])->create()->id,
            ]))
            ->has(Account::factory()->count(1)->state([
                'name' => 'Jimmy Savings',
                'amount' => 0,
                'account_type_id' => AccountType::factory()->state(['type' => 'savings'])->create()->id,
            ]))
            ->create([
                'name' => 'demo',
                'username' => 'demo',
                'email' => 'demo@668558.xyz',
                'password' => 'demo1234',
            ]);

        DestinationType::factory()->create([
            'type' => 'external'
        ]);
        DestinationType::factory()->create([
            'type' => 'internal'
        ]);

        Transaction::factory()->create([
            'description' => 'Demo Transaction',
            'amount' => 100,
            'transaction_type_id' => TransactionType::factory()->state(['type' => 'withdraw'])->create()->id,
            'account_id' => $user->accounts()->first()->id,
        ]);

        TransactionType::factory()->create([
            'type' => 'deposit'
        ]);
    }
}
