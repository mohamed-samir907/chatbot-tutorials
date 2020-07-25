<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;

class AddTodoConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->bot->reply('add todo');
    }
}
