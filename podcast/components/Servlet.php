<?php namespace Bubblecore\Podcast\Components;

use Cms\Classes\ComponentBase;
use Bubblecore\Podcast\Models\Episode;

class Servlet extends ComponentBase
{
    
    protected $episode = null;

    public function componentDetails()
    {
        return [
            'name'        => 'Servlet Component',
            'description' => 'Serves the audio file to podcatching software'
        ];
    }

    public function defineProperties()
    {
        return [
            'id' => [
                'title' => 'Episode ID',
                'description' => 'The id of the episode to be served up',
                'default' => '{{ :id }}.mp3',
                'type' => 'string',
            ],

        ];
    }

    public function onRun()
    {
        $this->page['file'] = $file = $this->getFile();
        return $this->getFile();
    }

    public function getFile()
    {
        if ($this->episode !== null)
            return $this->episode;

        if (!$id = $this->param('id'))
            return null;

        $episode = Episode::whereId($id)->first();

        $this->episode = $episode;

        $this->file = $episode->file;
        \Log::info(getType($this->file));

        return $this->file->output;
    }
}