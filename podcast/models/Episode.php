<?php namespace Bubblecore\Podcast\Models;

use Model;

/**
 * Episode Model
 */
class Episode extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'bubblecore_podcast_episodes';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];
    public $rules = [
        'title' => 'required|between,3,64',
        'duration' => 'required|regex:([0-9]{2}\:){5}',
        'pubDate' => 'required|date',
        'explicit' => 'boolean',
        'summary' => 'required|between,3,1024',
        'channel' => 'required|exists:bubblecore_podcast_channels,title',
        'file' => 'required|mimes:m4a,mp3,mov,mp4,m4v,pdf,epub'
    ];

    protected $dates = ['pubDate'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [
        'channel' => ['Bubblecore\Podcast\Models\Channel'],
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'file' => ['System\Models\File', 'order' => 'sort_order'],
    ];
    public $attachMany = [];

}