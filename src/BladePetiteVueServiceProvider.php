<?php

namespace WallaceMaxters\BladePetiteVue;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use WallaceMaxters\BladePetiteVue\View\Components\PetiteVue;

class BladePetiteVueServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'petite-vue');

        Blade::directive('petitevue', function ($expression) {

            $pageVarExpression = <<<PHP
                <?php echo json_encode([
                    'url'          => url()->current(),
                    'currentRoute' => request()->route()?->getName(),
                    'host'         => request()->host(),
                ]); ?>
            PHP;

            return <<<JS
                <style>[v-cloak]{ display: none; }</style>
                <script type="module">
                    import { createApp } from 'https://unpkg.com/petite-vue?module';

                    function LaravelComponent (props) {
                        return Object.assign({}, props);
                    }

                    const config = { LaravelComponent, \$page: {$pageVarExpression}  };

                    [].slice.call(document.querySelectorAll('.blade-petite-template-script')).forEach(function (el) {
                        const code = el.content.textContent.trim();
                        const fn = (new Function('props', `return \${code}`))();
                        config['LaravelComponent' + el.id] = fn;
                    });

                    createApp(config).mount();
                </script>
            JS;
        });

        Blade::component(PetiteVue::class);
    }
}
