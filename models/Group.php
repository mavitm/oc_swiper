<?php namespace Mavitm\Swiper\Models;

use Model;

/**
 * Model
 */
class Group extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $rules       = [];

    protected $jsonable = ['options', 'parameters'];

    public $table       = 'mavitm_swiper_group';

    public $attachOne = [
        'parallax' => 'System\Models\File'
    ];

    public $hasMany = [
        "items" => ["Mavitm\Swiper\Models\Item"]
    ];

}