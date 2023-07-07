<?php

namespace Tests;

use WallaceMaxters\BladePetiteVue\BladePetiteVueServiceProvider;

class PetiteVueTest extends TestCase
{
    public function testCommonComponent()
    {
        $v = $this->getView('foo', '<x-petite-vue :props="[\'test\' => 12345]"><a>@{{ test }}</a></x-petite-vue>');

        $this->assertStringStartsWith('<div v-cloak v-scope="LaravelComponent(', $v->render());
    }

    public function testComponentWithScriptBlock()
    {
        $v = $this->getView(
            'bar', 
            <<<HTML
                <x-petite-vue>
                    <x-slot name="script">
                        <script>function () {}</script>
                    </x-slot>
                </x-petite-vue>
            HTML
        );

        $result = $v->render();
        
        $this->assertStringContainsString('<template class=', $result);
        $this->assertStringContainsString('<script', $result);

    }
}