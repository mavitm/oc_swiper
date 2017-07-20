<?php namespace Mavitm\Swiper;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Mavitm\Swiper\Components\Carousel' => 'SwiperCarousel'
        ];
    }

    public function registerSettings()
    {
    }

    public function registerFormWidgets()
    {
        return [
            'Mavitm\Swiper\Formwidgets\Jsonable' => [
                'label' => 'jsonable',
                'code'  => 'jsonable'
            ]
        ];
    }
}
