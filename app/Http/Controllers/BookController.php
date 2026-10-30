<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('search')->trim()->value();

        $books = Book::query()
            ->when($search, function (Builder $query, string $search): void {
                $query->where(function (Builder $query) use ($search): void {
                    $query->where('title', 'like', "%{$search}%")
                        ->orWhere('author', 'like', "%{$search}%")
                        ->orWhere('publisher', 'like', "%{$search}%");
                });
            })
            ->orderBy('title')
            ->paginate(10)
            ->withQueryString();

        return view('books.index', compact('books', 'search'));
    }

    public function create(): View
    {
        return view('books.create', ['book' => new Book]);
    }

    public function store(Request $request): RedirectResponse
    {
        Book::create($this->validatedBook($request));

        return redirect()->route('books.index')->with('status', 'Buku berhasil ditambahkan.');
    }

    public function show(Book $book): View
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book): View
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book): RedirectResponse
    {
        $book->update($this->validatedBook($request));

        return redirect()->route('books.show', $book)->with('status', 'Data buku berhasil diperbarui.');
    }

    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();

        return redirect()->route('books.index')->with('status', 'Buku berhasil dihapus.');
    }

    /**
     * @return array{title: string, author: string, publisher: string, published_year: int, stock: int}
     */
    private function validatedBook(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'publisher' => ['required', 'string', 'max:255'],
            'published_year' => ['required', 'integer', 'between:1000,'.now()->year],
            'stock' => ['required', 'integer', 'min:0', 'max:2147483647'],
        ]);
    }
}
