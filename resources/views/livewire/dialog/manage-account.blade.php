<x-dialog :dialogState="$dialogState">
    <form wire:submit.prevent="submit">
        <div class="grid grid-rows-2">
            <div>
                <x-input.label for="name" :value="__('Account Name')" />
                <x-input.text wire:model="form.name" id="name" class="block mt-1 w-full" name="name" required />
                <x-input.error :messages="$errors->get('form.name')" class="mt-2" />
            </div>
            <div class="mt-2">
                <x-input.label for="type" :value="__('Account Type')" />
                <x-input.select wire:model="form.type" id="type" class="block mt-1 w-full" name="type" required :items="$this->types" id="id" text="name"/>
                <x-input.error :messages="$errors->get('form.type')" class="mt-2" />
            </div>
        </div>
        <div class="flex grid-rows-1 justify-between mt-5">
            <x-button.secondary wire:click="closeDialog" class="bg-red-700">{{ __('Cancel') }}</x-button.secondary>
            <x-button.primary>{{ __($confirmButtonText) }}</x-button.primary>
        </div>
    </form>
</x-dialog>
