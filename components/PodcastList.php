<?php namespace Bubblecore\Podcast\Components;

use Bubblecore\Podcast\Models\Channel;
use Bubblecore\Podcast\Models\Settings;
use Bubblecore\Podcast\Models\Timezone;
use Cms\Classes\Page;
use Cms\Classes\ComponentBase;

class PodcastList extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Podcast Episode List',
            'description' => 'Render a listing of a channel\'s episodes.'
        ];
    }

    public function defineProperties()
    {
        return [
            'channel' => [
                'title' => 'Channel',
                'type' => 'dropdown',
                'options' => $this->getChannels(),
            ],
            'number' => [
                'title' => 'Number of Episodes',
                'type' => 'string',
                'description' => 'Number of Episodes to list',
                'default' => '20',
            ],
            'player' => [
                'title' => 'Show Player?',
                'type' => 'checkbox',
                'description' => 'Show HTML5 player in list',
                'default' => '1'
            ],
            'format' => [
                'title' => 'List Format',
                'type' => 'dropdown',
                'description' => 'The format of the episode list',
                'options' => [
                    'mini' => 'Mini',
                    'normal' => 'Normal',
                    'expanded' => 'Expanded'
                ],
                'default' => 'normal'
            ],
            'detail' => [
                'title' => 'Detail Page',
                'type' => 'dropdown',
                'description' => 'The page to use for single episodes',
                'default' => 'none',
                'placeholder' => 'none',
            ],
            'episodeTerm' => [
                'title' => 'Episode Term',
                'type' => 'string',
                'description' => 'The term to use for an episode (e.g. "episode", "session", "post"',
                'default' => 'episode'
            ]
        ];
    }

    public function getDetailOptions()
    {
        return Page::getNameList();
    }

    private function getChannels()
    {
        $channels = Channel::lists('title','id');
        return $channels;
    }

    public function getChannel($id)
    {
        $channel = Channel::find($id);
        return $channel;
    }

    public function getEpisodes($channel)
    {
        return $channel->episodes->take($this->property('number'));
    }

    public function onRun()
    {
        $tz = Timezone::find(Settings::get('timezone'));
        $this->addJs('/plugins/bubblecore/podcast/assets/audiojs/audio.min.js');
        $this->addJs('/plugins/bubblecore/podcast/assets/audiojs/audiojs-shunt.js');

        $channel = $this->getChannel($this->property('channel'));
        $episodes = $this->getEpisodes($channel);
        $this->page['channel'] = $channel;
        $this->page['episodes'] = $episodes;
        $this->page['episodeCount'] = $episodes->count();
        \Log::info($tz->name);
        $this->page['player'] = $this->property('player');
        $this->page['format'] = $this->property('format');
        $this->page['detail'] = $this->property('detail');
        $this->page['episodeTerm'] = $this->property('episodeTerm');
        $this->page['timezone'] = $tz->name;
        
    }

}