<?php

namespace WallaceMaxters\BladePetiteVue;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use WallaceMaxters\BladePetiteVue\View\Components\PetiteVue;

class BladePetiteVueServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::directive('petitevue', function ($expression) {

            $pageVarExpression = <<<PHP
                <?php echo json_encode([
                    'url'          => url()->current(),
                    'currentRoute' => request()->route()?->getName(),
                    'host'         => request()->host(),
                ]); ?>
            PHP;

            return <<<JS
                <script type="module">
                    import { createApp } from 'https://unpkg.com/petite-vue?module';

                    function Laravel (props) {
                        return {
                            \$page: {$pageVarExpression},
                            ...props
                        }
                    }

                    createApp({ Laravel }).mount()
                </script>
            JS;
        });

        Blade::component(PetiteVue::class);
    }
}
