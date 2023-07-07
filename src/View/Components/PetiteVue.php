<?php

namespace WallaceMaxters\BladePetiteVue\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use UnexpectedValueException;

class PetiteVue extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $props = [])
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $id = str()->random();

        return \Illuminate\Support\Facades\View::make('petite-vue::components.petite-vue', [
            'id' => $id
        ]);
    }

    public function validateScriptSlot(string $value)
    {
        if (str_starts_with(trim($value), '<script')) return true;

        throw new UnexpectedValueException("The slot 'script' need to be a <script> tag.");
    }
}
