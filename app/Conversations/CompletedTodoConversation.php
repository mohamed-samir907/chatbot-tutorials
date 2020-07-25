<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;

class CompletedTodoConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->bot->reply('completed todos');
    }
}
