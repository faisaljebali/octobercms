<?php namespace Freelance\Service;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            \Freelance\Service\Components\AddContest::class       => 'add-contest',
        ];
    }

    public function registerSettings()
    {
    }
}
