<?php namespace Bubblecore\Podcast\Models;

use Model;

/**
 * Channel Model
 */
class Channel extends Model
{
    use \October\Rain\Database\Traits\Validation;
    /**
     * @var string The database table used by the model.
     */
    public $table = 'bubblecore_podcast_channels';

    public $customMessages = [ 'required_if' => 'The :attribute field is required when the :other is :display.'];

    public $rules = [
        'title' => 'required|between:3,64',
        'author' => 'required|between:3,64',
        'link' => 'required|url',
        'feedlink' => 'required|alpha_dash',
        'coverLink' => 'url',
        'keywords' => 'required',
        'category' => 'required|exists:bubblecore_podcast_categories,id',
        'category_id' => 'required|exists:bubblecore_podcast_categories,id',
        'subcategory_id' => 'required_if:category,1,2,4,5,6,7,11,12,13,14,15',
        'summary' => 'required',
        'description' => 'required',
        'ownerEmail' => 'email'
    ];

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'title',
        'author',
        'managingEditor',
        'webMaster',
        'ownerName',
        'ownerEmail',
        'coverTitle',
        'coverLink',
        'keywords',
        'summary',
        'description',
        'category_id',
        'subcategory_id',
        'category',
        'explicit',
        'feedlink',
        'link'
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [
        'episodes' => ['Bubblecore\Podcast\Models\Episode'],
    ];
    public $belongsTo = [
        'category' => ['Bubblecore\Podcast\Models\Category'],
        'subcategory' => ['Bubblecore\Podcast\Models\Subcategory']
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [ ];
    public $attachOne = [];
    public $attachMany = [
        'image' => ['System\Models\File', 'order' => 'sort_order'],
    ];

    public function beforeValidate()
    {
        $this->customMessages['required_if'] = str_replace(':display', $this->category->name, $this->customMessages['required_if']);

    }
    public function afterValidate()
    {
        \Log::info($this->customMessages);
    }

    public function beforeSave()
    {
        if ($this->subcategory_id == null | $this->subcategory_id == '')
            $this->subcategory_id = 0;
    }

    public function getCategoryOptions()
    {
        return Category::getNameList();
    }

    public function getSubcategoryOptions()
    {
        return Subcategory::getNameList($this->category_id);
    }
}