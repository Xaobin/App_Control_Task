<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Task;

class NewTaskMail extends Mailable
{
    use Queueable, SerializesModels;
    public $task;
    public $date_limit_conclusion;
    public $url;
    /**
     * Create a new message instance.  
     *
     * @return void
     */
    public function __construct(Task $task)
    {
        $this->task = $task->task;
        $this->date_limit_conclusion = date('d/m/Y', strtotime($task->date_limit_conclusion));
        $this->url = 'http://localhost:8000/task/'.$task->id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.new_task')->subject('New task created');;
    }
}
