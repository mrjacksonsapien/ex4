<x-layout>
    <x-slot name="title">{{ __('app.book_detail_title') }}</x-slot>

    <div class="container mx-auto py-6">

        <x-book-item :book="$book" />

        <div class="mt-6 mb-6">
            <h3 class="font-semibold mb-2">Quoi faire?</h3>
            <p>{{ $book['description'] }}</p>
        </div>

        <a href="{{ route('books.index', $book['id']) }}"
           class="bg-red-500 px-4 py-2 text-white rounded inline-block">
            {{ __('app.back_to_list_lbl') }}
        </a>

    </div>
</x-layout>
