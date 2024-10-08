<?php

namespace App\Livewire\Dialog;

use App\DialogTrait;
use App\Livewire\Dashboard;
use App\Livewire\Forms\ManageAccountForm;
use App\Models\AccountType;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ManageAccount extends Component
{
    use DialogTrait;

    public ManageAccountForm $form;

    #[Computed]
    public function types(): Collection
    {
        return AccountType::all()->map(function (AccountType $accountType) {
            return ['name' => ucfirst($accountType->type), 'id' => $accountType->id];
        });
    }

    public function update(): void
    {
        $this->validate();
        $this->form->updateAccount($this->form->all());
        $this->closeDialog(Dashboard::class);
    }

    public function submit(): void
    {
        $this->validate();
        $this->form->addAccount();
        $this->closeDialog(Dashboard::class);
    }
}
