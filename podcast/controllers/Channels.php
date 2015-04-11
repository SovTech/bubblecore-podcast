<?php namespace Bubblecore\Podcast\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Channels Back-end Controller
 */
class Channels extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = ['bubblecore.podcast.access_channels'];

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Bubblecore.Podcast', 'podcast', 'channels');
    }

    
}