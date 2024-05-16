<div class="container mx-auto">
    <livewire:dialog.manageAccount />

    <div class="flex justify-between">
        <h1 class="text-3xl">{{ __('Accounts') }}</h1>
        <x-button.primary wire:click="$dispatchTo('dialog.manage-account', 'open-dialog')">Add</x-button.primary>
    </div>
    <hr>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mt-5">
        @foreach($this->accounts as $account)
            <div class="rounded-xl border min-w-60 shadow-md pb-4 mx-2">
                <div class="grid grid-rows-1 justify-end pr-3 text-right pt-2">
                    <div>
                        <x-button.icon icon="edit" class="mr-2" wire:click="$dispatchTo('dialog.manage-account', 'open-dialog', { data: {{ $account }}, confirmButtonText: 'Save' })" />
                        <x-button.icon icon="bin" class="text-red-600" wire:click="deleteAccount('{{ $account->id }}')" />
                    </div>
                </div>

                <div class="grid grid-rows-3 justify-center items-center content-center">
                    <h5 class="capitalize underline decoration-sky-500/30 text-center">{{ $account->name }}</h5>
                    <h6 class="text-center uppercase text-xs text-gray-500 text-center">{{ $account->accountType->type }}</h6>
                    <span class="text-center">${{ $account->amount }}</span>
                </div>
            </div>
        @endforeach
    </div>

</div>


