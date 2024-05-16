<?php

namespace App\Livewire;

use App\Models\Account;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class Dashboard extends Component
{
    #[Computed]
    public function accounts(): Collection
    {
        return Account::whereHas('users', function ($query) {
            $query->where('user_id', auth()->id());
        })->orderBy('created_at')->with('accountType')->get();
    }

    #[On('refresh')]
    public function refresh()
    {
        $this->dispatch('$refresh');
    }

    // TODO Deal with multiple account attaches
    public function deleteAccount($id): void
    {
        try {
            DB::beginTransaction();
            $account = Account::find($id);
            $account->delete();
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
        }
    }
}
