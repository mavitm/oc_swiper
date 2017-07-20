<?php namespace Mavitm\Swiper\Models;

use Model;

/**
 * Model
 */
class Item extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    public $rules = [];

    public $table = 'mavitm_swiper_items';

    public $attachOne = [
        'img' => 'System\Models\File'
    ];

    public $belongsTo = [
        "group" => ["Mavitm\Swiper\Models\Group",'key' => 'group_id', 'otherKey' => 'id']
    ];
}