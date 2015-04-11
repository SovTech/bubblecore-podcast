<?php namespace Bubblecore\Podcast\Controllers;

use BackendMenu;
use System\Classes\SettingsManager;
use Backend\Classes\Controller;

/**
 * Settings Back-end Controller
 */
class Settings extends Controller
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

        BackendMenu::setContext('Bubblecore.Podcast', 'podcast', 'settings');
        SettingsManager::setContext('Bubblecore.Podcast', 'podcast');
    }
}