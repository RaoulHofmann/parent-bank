<?php

namespace App;

use Livewire\Attributes\On;

trait DialogTrait
{
    public bool $dialogState = false;
    public string $confirmButtonText = 'Add';
    public ?array $dialogData = null;

    #[On('open-dialog')]
    public function openDialog($data = null, $confirmButtonText = null): void
    {
        $this->dialogState = true;

        if ($confirmButtonText !== null) {
            $this->confirmButtonText = $confirmButtonText;
        }

        if ($data !== null) {
            $this->dialogData = $data;
        }

        if (property_exists($this, 'form')) {
            $this->form->setData($this->dialogData);
        }
    }

    public function closeDialog($targetClass = null): void
    {
        $this->dialogState = false;
        $targetClass !== null ? $this->dispatch('refresh', $targetClass) : $this->dispatch('refresh');
        if (property_exists($this, 'form')) {
            $this->form->reset();
            $this->dialogData = null;
        }
    }
}
