<?php

namespace App\Livewire;

use Livewire\Component;
use OpenAI;

class Chat extends Component
{
    public $content = '';
    public $messages = [];

    public function send()
    {
        $this->validate([
            'content' => 'required|string|max:255',
        ]);

        $this->messages[] = ['role' => 'user', 'content' => $this->content];

        $response = $this->getResponse();

        $this->messages[] = ['role' => 'assistant', 'content' => $response];

        $this->content = '';
    }

    protected function getResponse()
    {
        $client = OpenAI::client(env('OPENAI_API_KEY'));
        
        $result = $client->chat()->create([            
            'model' => 'gpt-4o-mini',
            'messages' => $this->messages,
        ]);

        return $result->choices[0]->message->content;
    }

    public function render()
    {
        return view('livewire.chat');
    }
}
