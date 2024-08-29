<x-dialog :dialogState="$dialogState">
    <form wire:submit.prevent="{{ $edit === false ? 'submit' : 'update' }}">
        <h4>{{ $dialogData !== null ? __('Edit') : __('New') }} {{ __('Account') }}</h4>
        <hr>
        <div class="grid grid-rows-auto mt-2">
            <div class="mt-2">
                <x-input.label for="name" :value="__('Account Name')" />
                <x-input.text wire:model="form.name" id="name" class="block mt-1 w-full" required />
                <x-input.error :messages="$errors->get('form.name')" class="mt-2" />
            </div>
            <div class="mt-3">
                <x-input.label for="type" :value="__('Account Type')" />
                <x-input.select wire:model="form.type" id="type" class="block mt-1 w-full" name="type" required :items="$this->types" id="id" text="name"/>
                <x-input.error :messages="$errors->get('form.type')" class="mt-2" />
            </div>
            @if($edit === false)
                <div class="mt-3">
                    <x-input.label for="amount" :value="__('Initial Amount')" />
                    <x-input.text wire:model="form.amount" id="amount" class="block mt-1 w-full" placeholder="Enter Amount" />
                    <x-input.error :messages="$errors->get('form.amount')" class="mt-2" />
                </div>
            @endif
        </div>
        <div class="flex grid-rows-1 justify-between mt-5">
            <x-button.secondary wire:click="closeDialog" class="bg-red-700">{{ __('Cancel') }}</x-button.secondary>
            <x-button.primary>{{ __($confirmButtonText) }}</x-button.primary>
        </div>
    </form>
</x-dialog>
