<?php

namespace App\Jobs\Book;

use App\Book;
use App\Jobs\Job;
use App\Events\Book\WasCreated;
use App\User;
use Illuminate\Http\Request;
use Guzzle\Service\Command\RequestSerializerInterface;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Events\Dispatcher;

class CreateBook extends Job implements SelfHandling
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Dispatcher $event)
    {
        $book = Book::create($this->request->input('book'));

        $event->fire(new WasCreated($book));
    }
}
