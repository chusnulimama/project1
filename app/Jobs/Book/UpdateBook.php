<?php

namespace App\Jobs\Book;

use App\Book;
use App\Jobs\Job;
use App\Events\Book\WasUpdated;
use Illuminate\Http\Request;
use Illuminate\Events\Dispatcher;
use Illuminate\Contracts\Bus\SelfHandling;

class UpdateBook extends Job implements SelfHandling
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $book;
    protected $request;

    public function __construct(Request $request, Book $book)
    {
        $this->request = $request;
        $this->book = $book;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Dispatcher $event)
    {
        $this->updateBook();

        return $event->fire(new WasUpdated($this->book));
    }

    protected function updateBook()
    {
        $data = $this->request->input(book);

        $book = $this->book->update($data);

        return $book;
    }
}
