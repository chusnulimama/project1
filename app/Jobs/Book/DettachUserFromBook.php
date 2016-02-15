<?php

namespace App\Jobs\Book;

use App\Book;
use App\Events\Book\BookWasDettached;
use App\Jobs\Job;
use App\User;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Events\Dispatcher;

class DettachUserFromBook extends Job implements SelfHandling
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $user;
    protected $book;
    public function __construct(User $user, Book $book)
    {
        $this->user = $user;
        $this->book = $book;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Dispatcher $event)
    {
        $this->user->books()->detach($this->book->id);

        $event->fire(new BookWasDettached($this->user));
    }
}
