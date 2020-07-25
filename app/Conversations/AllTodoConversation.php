<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Incoming\Answer;
use App\Repositories\TodoRepositoryInterface;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class AllTodoConversation extends Conversation
{
    /** @var TodoRepositoryInterface */
    protected $repo;

    /**
     * Constructor.
     *
     * @param TodoRepositoryInterface $repo
     */
    public function __construct()
    {
        $this->repo = app(TodoRepositoryInterface::class);
    }

    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $todos = $this->repo->all();

        $buttons = [];

        foreach ($todos as $todo) {
            $buttons[] = Button::create($todo->title)
                               ->value($todo->id)
                               ->name('todo');
        }

        $question = Question::create("All Todos (Click on it to edit/delete)")
                            ->fallback('Can not fetch all todos')
                            ->callbackId('ask_all_todos')
                            ->addButtons($buttons);

        $this->ask($question, function(Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $this->handleValue($answer->getValue());
            }
        });
    }

    /**
     * Delete or edit the todo.
     *
     * @param  int $id
     * @return mixed
     */
    public function handleValue(int $id)
    {
        $question = Question::create("All Todos (Click on it to edit/delete)")
                            ->fallback('Can not fetch all todos')
                            ->callbackId('ask_all_todos')
                            ->addButtons([
                                Button::create("Edit")->value("edit")->name('handle_todo'),
                                Button::create("Delete")->value("delete")->name('handle_todo'),
                            ]);

        $this->ask($question, function(Answer $answer) use ($id) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() == 'edit') {
                    // 
                } elseif ($answer->getValue() == 'delete') {
                    $this->repo->delete($id);
                    $this->bot->reply("Todo Deleted successfully");
                }
            }
        });
    }
}
