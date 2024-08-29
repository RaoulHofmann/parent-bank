<?php

namespace App\Livewire\Forms;

use App\Models\Account;
use App\Models\Transaction;
use App\Models\TransactionType;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Form;

// TODO create toast for feedback from form
class ManageAccountForm extends Form
{
    public ?string $id = null;

    #[Validate('required')]
    public string $name = '';

    #[Validate('required')]
    public string $type = '';

    #[Validate('numeric')]
    public ?int $amount;

    public function setData(array $data = null): void
    {
        $this->id = $data['id'] ?? null;
        $this->name = $data['name'] ?? '';
        $this->type = $data['account_type_id'] ?? '';
        $this->amount = $data['amount'] ?? 0;
    }

    // TODO Deal with multiple account attaches
    public function addAccount(): void
    {
        try {
            DB::beginTransaction();
            $account = Account::create([
                'name' => $this->name,
                'amount' => ($this->amount * 100),
                'account_type_id' => $this->type,
            ]);
            $account->users()->sync([auth()->id()]);

            Transaction::create([
                'source_account_id' => $account->id,
                'description' => 'New Account',
                'transaction_type_id' => TransactionType::where('type', 'deposit')->first()->id,
                'amount' => $this->amount,
            ]);
            DB::commit();
        } catch (\Exception $ex) {
            error_log($ex->getMessage());
            DB::rollBack();
        }
    }

    // TODO Deal with multiple account attaches
    public function updateAccount($data): void
    {
        try {
            DB::beginTransaction();
            $account = Account::find($data['id']);
            $account->update([
                'name' => $this->name,
                'account_type_id' => $this->type,
            ]);
            DB::commit();
        } catch (\Exception $ex) {
            error_log($ex->getMessage());
            DB::rollBack();
        }
    }
}
