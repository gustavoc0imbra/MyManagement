<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            {{ __('Product') }}
        </h2>
        <a class="space-x-2" href="{{ route('product.create') }}">
            <x-primary-button type="button">
                {{ __('Add Product') }}
            </x-primary-button>
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col justify-center items-center gap-5 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <table class="w-3/4 border border-gray-200 rounded-md my-2 p-6">
                    <thead class="bg-slate-900">
                    <tr class="text-center dark:text-gray-200">
                        <th>{{ __('Id') }}</th>
                        <th>{{ __('Category') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Created At') }}</th>
                        <th>{{ __('Image') }}</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr class="dark:text-gray-200 text-center">
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->formatedDate($product->created_at) }}</td>
                            <td><img src="{{ asset($product->imgPath) }}" alt=""></td>
                            <td class="flex gap-2">
                                <a href="{{ route('product.edit', $product->id) }}">
                                    <x-alert-button>{{ __('Edit') }}</x-alert-button>
                                </a>
                                <form id="delProductForm" action="{{ route('product.destroy', $product->id) }}" method="POST">
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
