@props(['dialogState'])

<div class="fixed inset-0 overflow-y-auto {{ $dialogState ? 'visible' : 'invisible' }}">
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="inline-block align-middle bg-white rounded-lg p-8 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            {{ $slot }}
        </span>
    </div>
</div>
