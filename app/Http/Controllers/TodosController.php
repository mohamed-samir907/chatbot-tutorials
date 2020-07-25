<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use App\Conversations\OptionsConversation;

class TodosController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        // user: hi
        // bot: hi user
        // bot: option [add todo, all todos, completed todos, not completed todos]

        $botman->hears('hi', function($bot) {
            $bot->reply('hello');
            $this->startConversation($bot);
        });

        $botman->listen();
    }

    /**
     * Start Conversation.
     *
     * @param BotMan $bot
     * @return void
     */
    public function startConversation(BotMan $bot)
    {
        $bot->startConversation(new OptionsConversation());
    }
}
