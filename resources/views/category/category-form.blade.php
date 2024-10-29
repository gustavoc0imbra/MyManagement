<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            {{ $category ? __('Update Category') : __('Add Category') }}
        </h2>
    </x-slot>

    <div class="flex justify-center py-12">
        <div class="w-3/4 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
            <form class="w-full grid grid-cols-1 gap-2 p-4" action="{{ $category ? route('category.update', $category->id) : route('category.store') }}" method="post">
                @csrf
                @if(isset($category->id))
                    @method('PUT')
                @endif
                <x-input-label class="col-span-1 font-semibold text-xl" for="categoryName" value="{{ __('Name') }}" />
                <x-text-input class="col-span-1 w-full" type="text" name="name" value="{{ isset($category->id) ? $category->name : old('name') }}" />
                @error('name')
                    <x-input-error :messages="$errors->get('name')" />
                @enderror
                <div class="w-full flex justify-end gap-6">
                    <a href="{{ route('category.index') }}">
                        <x-danger-button type="button">{{ __('Back') }}</x-danger-button>
                    </a>
                    <x-primary-button type="submit">{{ __('Save') }}</x-primary-button>
                </div>

            </form>

        </div>

    </div>

</x-app-layout>
