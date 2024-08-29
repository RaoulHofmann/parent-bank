<?php

namespace App\Livewire\Dialog;
//deleteAccount('{{ $account->id }}')
use App\DialogTrait;
use App\Livewire\Dashboard;
use App\Models\Account;
use Livewire\Component;

class DeleteAccount extends Component
{
    use DialogTrait;

    /**
     * Create a new class instance.
     */
    public function deleteAccount(): void
    {
        $account = Account::find($this->dialogData['id']);
        $account->delete();
        $this->dispatch('refresh', Dashboard::class);
        $this->closeDialog(Dashboard::class);
    }
}
