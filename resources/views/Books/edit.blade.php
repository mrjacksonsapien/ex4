<x-layout>
    <x-slot name="title">{{ __('app.book_edit_title') }}</x-slot>

    <x-errors :errors="$errors" />

    <form method="POST" action="{{ route('books.update', $book->id) }}">
        @method('PUT')
        @csrf
        <div class="border-b border-gray-900/10 pb-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="title" class="block text-sm/6 font-medium text-gray-900">
                        {{ __('app.edit.title') }}
                    </label>
                    <div class="mt-2">
                        <input id="title" name="title" type="text"
                               class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1
                                -outline-offset-1 outline-gray-300 Placeholder:text-gray-400 focus:outline-2
                                focus:-outline-offset-2 focus:outline-blue-600 sm:text-sm/6
                                @error('title') border border-red-500 @enderror" value="{{ old('title', $task->title) }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="submit"
                    class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-xs
                           hover:bg-blue-500 focus-visible:outline-2 focus-visible:outline-offset-2
                           focus-visible:outline-blue-600">
                {{ __('app.edit.save') }}
            </button>
        </div>
    </form>

</x-layout>
