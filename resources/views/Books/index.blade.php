<x-layout>
    <x-slot name="title">{{ __('app.book_list_title') }}</x-slot>

    @can('create', App\Models\Book::class)
        <a href="{{ route('books.create') }}"
           class="bg-red-500 px-4 py-2 mb-6 text-white rounded inline-block">
            {{ __('app.book_create_lbl') }}
        </a>
    @endcan

    <div class="container mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4">{{ __('app.book_list_title') }}</h1>

        @if($books->isEmpty())
            <p>{{ __('app.no_books_msg') }}</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($books as $book)
                    <x-book-item :task="$book">

                        @can('view', $book)
                            <a href="{{ route('books.show', $book['id']) }}"
                               class="bg-red-500 px-4 py-2 text-white rounded inline-block">
                                {{ __('app.book_detail_button_lbl') }}
                            </a>
                        @endcan

                        @can('update', $book)
                            <a href="{{ route('books.edit', $book['id']) }}"
                               class="bg-red-500 px-4 py-2 text-white rounded inline-block">
                                {{ __('app.book_edit_button_lbl') }}
                            </a>
                        @endcan

                        @can('delete', $book)
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="bg-red-500 px-4 py-2 text-white rounded inline-block"
                                        onclick="return confirm('{{ __('app.book_confirm_delete') }}')">
                                    {{ __('app.book_delete_button_lbl') }}
                                </button>
                            </form>
                        @endcan
                    </x-book-item>
                @endforeach
            </div>
        @endif
    </div>
</x-layout>
