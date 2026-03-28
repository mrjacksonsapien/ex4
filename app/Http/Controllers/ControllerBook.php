<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskFormRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function show(Book $book)
    {
        Gate::authorize('view', $book);

        return view('tasks.show', compact('book'));
    }

    public function create()
    {
        Gate::authorize('create', Task::class);

        return view('books.create');
    }

    public function edit(Book $book)
    {
        Gate::authorize('update', $book);

        return view('books.edit', ['book' => $book]);
    }

    public function store(BookFormRequest $request): RedirectResponse
    {
        Gate::authorize('create', Book::class);

        $validated = $request->validated();

        $book = new Book();
        $book->title = $validated['title'];
        $book->description = $validated['description'] ?? '';
        $book->completed = $request->has('completed');


        return redirect()->route('books.index');
    }

    public function update(BookFormRequest $request, Book $book): RedirectResponse
    {
        Gate::authorize('update', $book);

        $attributes = $request->validated();
        $book->update($attributes);

        return redirect()->route('books.index');
    }

    public function destroy(Book $book): RedirectResponse
    {
        Gate::authorize('delete', $book);

        $book->delete();

        return redirect()->route('books.index');
    }
}
