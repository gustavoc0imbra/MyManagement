<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            {{ __('Category') }}
        </h2>
        <a class="space-x-2" href="{{ route('category.create') }}">
            <x-primary-button type="button">
                {{ __('Add Category') }}
            </x-primary-button>
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col justify-center items-center gap-5 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <table class="w-3/4 border border-gray-200 rounded-md p-6">
                    <thead class="bg-slate-900">
                        <tr class="text-center dark:text-gray-200">
                            <th>{{ __('Id') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Created At') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr class="dark:text-gray-200 text-center">
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td class="flex gap-2">
                                <a href="{{ route('category.edit', $category->id) }}">
                                    <x-alert-button>{{ __('Edit') }}</x-alert-button>
                                </a>
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button type="submit">{{ __('Delete') }}</x-danger-button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
