<div class="container mx-auto">
    <livewire:dialog.manageAccount />

    <div class="flex justify-between">
        <h1 class="text-3xl">{{ __('Accounts') }}</h1>
        <x-button.primary wire:click="$dispatchTo('dialog.manage-account', 'open-dialog')">Add</x-button.primary>
    </div>
    <hr>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mt-5">
        @foreach($this->accounts as $account)
            <div class="rounded-xl border min-w-60 shadow-md py-4 mx-2">
                <div class="grid grid-rows-1 justify-end pr-5 text-right">
                    <x-button.icon icon="edit" wire:click="$dispatchTo('dialog.manage-account', 'open-dialog', { data: {{ $account }}, confirmButtonText: 'Edit' })" />
                    <x-button.icon icon="bin" class="text-red-600" wire:click="deleteAccount('{{ $account->id }}')" />
                </div>

                <div class="grid grid-rows-3 justify-center items-center content-center">
                    <h5 class="capitalize underline decoration-sky-500/30">{{ $account->name }}</h5>
                    <h6 class="text-center uppercase text-xs text-gray-500">{{ $account->accountType->name }}</h6>
                    <span class="text-center ">$ {{ $account->amount }}</span>
                </div>
            </div>
        @endforeach
    </div>

</div>


