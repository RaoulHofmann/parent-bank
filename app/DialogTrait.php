<?php

namespace App;

use Livewire\Attributes\On;

trait DialogTrait
{
    public bool $dialogState = false;
    public string $confirmButtonText = 'Add';
    public ?array $dialogData = null;
    public bool $edit = false;

    #[On('open-dialog')]
    public function openDialog($data = null, $confirmButtonText = null): void
    {
        $this->dialogState = true;
        $this->dialogData = null;
        $this->edit = false;

        // Might move this back to closeDialog, less jarring here but ehh doesn't seem right
        if (property_exists($this, 'form')) {
            $this->form->reset();
        }

        if ($confirmButtonText !== null) {
            $this->confirmButtonText = $confirmButtonText;
        }

        if ($data !== null) {
            $this->dialogData = $data;
            $this->edit = true;
        }

        if (property_exists($this, 'form') && $this->dialogData !== null) {
            $this->form->setData($this->dialogData);
        }
    }

    public function closeDialog($targetClass = null): void
    {
        $this->dialogState = false;
        $targetClass !== null ? $this->dispatch('refresh', $targetClass) : $this->dispatch('refresh');
    }
}
