<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            {{ $product ? __('Update Category') : __('Add Category') }}
        </h2>
    </x-slot>

    <div class="flex justify-center py-12">
        <div class="w-3/4 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
            <form class="w-full grid grid-cols-1 gap-2 p-4" action="{{ isset($product->id) ? route('product.update', $product->id) : route('product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if(isset($product->id))
                    @method('PUT')
                @endif
                <x-input-label for="productName" class="col-span-1 font-semibold text-xl"  value="{{ __('Name') }}" />
                <x-text-input id="productName" class="col-span-1 w-full" type="text" name="name" value="{{ isset($product->id) ? $product->name : old('name') }}" />
                @error('name')
                <x-input-error :messages="$errors->get('name')" />
                @enderror
                <x-input-label for="productCategory" class="text-xl" value="{{ __('Category') }}"></x-input-label>
                <x-select-input id="productCategory" name="category_id" >
                    <option>{{ __('Select one category') }}</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </x-select-input>
                @error('category_id')
                <x-input-error :messages="$errors->get('category_id')" />
                @enderror
                <x-input-label for="productDescrition" class="col-span-1 font-semibold text-xl"  value="{{ __('Description') }}" />
                <x-text-input id="productDescrition" class="col-span-1 w-full" type="text" name="description" value="{{ isset($product->id) ? $product->description : old('description') }}" />
                @error('description')
                <x-input-error :messages="$errors->get('description')" />
                @enderror
                <div class="w-full flex gap-5">
                    <x-input-label for="productCostPrice" class="font-semibold text-xl"  value="{{ __('Cost Price') }}" />
                    <input id="productCostPrice" class="w-full" type="number" step="0.01" name="costPrice" value="{{ isset($product->id) ? $product->cost_price : old('costPrice') }}" />
                    @error('costPrice')
                    <x-input-error :messages="$errors->get('costPrice')" />
                    @enderror
                    <x-input-label for="productSellingPrice" class="font-semibold text-xl"  value="{{ __('Selling Price') }}" />
                    <input id="productSellingPrice" class="w-full" type="number" step="0.01" name="sellingPrice" value="{{ isset($product->id) ? $product->selling_price : old('sellingPrice') }}" />
                    @error('sellingPrice')
                    <x-input-error :messages="$errors->get('sellingPrice')" />
                    @enderror
                </div>
                <x-file-input name="imgPath" />
                @error('imgPath')
                    <x-input-error :messages="$errors->get('imgPath')" />
                @enderror
                <div class="w-full flex justify-end gap-6">
                    <a href="{{ route('product.index') }}">
                        <x-danger-button type="button">{{ __('Back') }}</x-danger-button>
                    </a>
                    <x-primary-button type="submit">{{ __('Save') }}</x-primary-button>
                </div>

            </form>

        </div>

    </div>

</x-app-layout>
