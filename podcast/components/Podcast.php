<?php namespace Bubblecore\Podcast\Components;

use Cms\Classes\ComponentBase;

class Podcast extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Podcast Component',
            'description' => 'Render a list of episodes.'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

}
