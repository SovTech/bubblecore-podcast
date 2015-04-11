<?php namespace Bubblecore\Podcast\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Episodes Back-end Controller
 */
class Episodes extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Bubblecore.Podcast', 'podcast', 'episodes');
    }
}