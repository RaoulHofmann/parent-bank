<?php

namespace App;

use Livewire\Attributes\On;

trait DialogTrait
{
    public bool $dialogState = false;

    public string $confirmButtonText = 'Add';

    public ?array $data = null;

    #[On('open-dialog')]
    public function openDialog($data, $confirmButtonText): void
    {
        $this->dialogState = true;

        if ($confirmButtonText !== null) {
            $this->confirmButtonText = $confirmButtonText;
        }

        // Set form data if form property exists and data is not null
        if (property_exists($this, 'form') && ! is_null($data)) {
            $this->data = $data;
            $this->form->setData($this->data); // Assuming you have a method like setData in your form class
        }
    }

    public function closeDialog($targetClass): void
    {
        $this->dialogState = false;
        $this->dispatch('refresh', $targetClass);
        if (property_exists($this, 'form')) {
            $this->form->reset();
        }
    }
}
