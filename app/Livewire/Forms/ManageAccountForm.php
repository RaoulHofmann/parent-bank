<?php

namespace App\Livewire\Forms;

use App\Models\Account;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Form;

// TODO create toast for feedback from form
class ManageAccountForm extends Form
{
    #[Validate('required')]
    public string $name = '';

    #[Validate('required')]
    public string $type = '';

    public function setData(array $data): void
    {
        $this->name = $data['name'] ?? '';
        $this->type = $data['account_type_id'] ?? '';
    }

    // TODO Deal with multiple account attaches
    public function addAccount(): void
    {
        try {
            DB::beginTransaction();
            $account = Account::create([
                'name' => $this->name,
                'account_type_id' => $this->type,
            ]);
            $account->users()->sync([auth()->id()]);
            DB::commit();
        } catch (\Exception $ex) {
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
            DB::rollBack();
        }
    }
}
