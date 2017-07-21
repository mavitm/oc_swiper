<?php namespace Mavitm\Swiper\Components;

use Response;
use Cms\Classes\ComponentBase;
use Mavitm\Swiper\Models\Group;
use Mavitm\Swiper\Models\Item;

class Childs extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Swiper json api',
            'description' => 'for Javascript ajax request'
        ];
    }

    public function defineProperties()
    {
        return [
            'groupid' => [
                'title'       => 'groupid',
                'description' => 'Target group.',
                'type'        => 'dropdown'
            ],
        ];
    }

    public function getGroupidOptions(){
        return Group::get()->lists("name","id");
    }

    public function onRun()
    {
        $items = $this->page['items'] = Item::where("group_id", "=", $this->property('groupid'))->get()->toArray();
        return Response::json($items, 200)->send();
    }
}
