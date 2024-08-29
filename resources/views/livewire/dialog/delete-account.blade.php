<x-dialog :dialogState="$dialogState">
    <h4>{{ __('Delete Account') }}</h4>
    <hr>
    <div class="grid grid-rows-auto mt-2">
        <p>Are you sure you want to delete <u>{{ $dialogData !== null ? $dialogData['name'] : '' }}</u></p>
    </div>
    <div class="flex grid-rows-1 justify-between mt-5">
        <x-button.secondary wire:click="closeDialog" class="bg-red-700">{{ __('Cancel') }}</x-button.secondary>
        <x-button.delete wire:click="deleteAccount">{{ __('Delete') }}</x-button.delete>
    </div>
</x-dialog>
