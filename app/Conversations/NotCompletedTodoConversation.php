<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;

class NotCompletedTodoConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->bot->reply('not completed todos');
    }
}
