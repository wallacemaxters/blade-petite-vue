<?php

namespace WallaceMaxters\PetiteBlade\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PetiteVue extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public ?string $props = null)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return "<div v-scope=\"Laravel({$this->props})\" {{ \$attributes }}>{{ \$slot }}</div>";
    }
}