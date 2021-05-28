<?php
namespace Husnet\OmegaPlugin\BS5Card;

use Husnet\OmegaPlugin\BS5Card\Http\Controllers\Overt\PluginController;
use rohsyl\OmegaCore\Utils\Common\Plugin\Form\PluginFormFactory;
use rohsyl\OmegaCore\Utils\Common\Plugin\Plugin as OmegaPlugin;
use rohsyl\OmegaCore\Utils\Common\Plugin\Type\TextSimple\TextSimple;
use rohsyl\OmegaCore\Utils\Common\Plugin\Type\TextRich\TextRich;
use rohsyl\OmegaCore\Utils\Common\Plugin\Type\Checkbox\Checkbox;

class Plugin extends OmegaPlugin
{
    const NAME = 'Card Bootstrap 5';

    /**
     * Here name your plugin
     * @return string
     */
    public function name() : string {
        return self::NAME;
    }

    function overtController() : string {
        return PluginController::class;
    }

    public function install() : bool {

        $this->createForm();

        return true;
    }

    private function createForm() {

        $radioOptions = [
            "default" => 0,
            "options" => [

            ]
        ];

        $this->makeForm(function(PluginFormFactory $builder) use ($radioOptions) {
            $builder->form('Bootstrap 5 card', true, true);
            $builder->entry('header', TextSimple::class, null, 'Card Title', null, 0, false);
            $builder->entry('content', TextRich::class, null, 'Card Content', null, 0, false);
            $builder->entry('footer', TextSimple::class, null, 'Card Footer', null, 0, false);
            $builder->entry('footerMute', Checkbox::class, ["checked" => false], 'Footer text muted', null, 0, false);
			// ...
        });

    }
}