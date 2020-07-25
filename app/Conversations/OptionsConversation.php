<?php

namespace App\Conversations;

use App\Conversations\AddTodoConversation;
use App\Conversations\AllTodoConversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use App\Conversations\CompletedTodoConversation;
use App\Conversations\NotCompletedTodoConversation;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class OptionsConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $question = Question::create("What do you need")
            ->fallback('Unabale to choose option')
            ->callbackId('ask_about_option')
            ->addButtons([
                Button::create('Add todo.')->value('add'),
                Button::create('All todos.')->value('all'),
                Button::create('Completed todos.')->value('completed'),
                Button::create('Not Completed todos.')->value('not_completed'),
            ]);
        
        $this->bot->ask($question, function(Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $value = $answer->getValue();

                switch ($value) {
                    case 'add':
                        $this->bot->startConversation(new AddTodoConversation());
                        break;
                    case 'all':
                        $this->bot->startConversation(new AllTodoConversation());
                        break;
                    case 'completed':
                        $this->bot->startConversation(new CompletedTodoConversation());
                        break;
                    case 'not_completed':
                        $this->bot->startConversation(new NotCompletedTodoConversation());
                        break;
                }
            }
        });
    }
}
