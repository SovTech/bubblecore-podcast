<?php namespace Bubblecore\Podcast\Models;

use Model;

/**
 * Subcategory Model
 */
class Subcategory extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'bubblecore_podcast_subcategories';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = ['name','key'];

    public $timestamps = false;

    public $rules = [
        'name' => 'required',
        'key' => 'required',
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [
        'category' => ['Bubblecore\Podcast\Models\Category']
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    protected static $nameList = null;

    public static function getNameList($categoryId)
    {
        if (isset(self::$nameList[$categoryId]))
            return self::$nameList[$categoryId];

        return self::$nameList[$categoryId] = self::whereCategoryId($categoryId)->lists('name', 'id');
    }

    public static function formSelect($name, $categoryId = null, $selectedValue = null, $options = [])
    {
        return Form::select($name, self::getNameList($categoryId), $selectedValue, $options);
    }
}