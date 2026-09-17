@extends('layouts.app')

@section('header-title', __('Edit Sub Category'))

@section('content')
    <div class="page-title">
        <div class="d-flex gap-2 align-items-center">
            <i class="fa-solid fa-border-all"></i> {{__('Edit Sub Category')}}
        </div>
    </div>
    <form action="{{ route('admin.subcategory.update', $subCategory->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="card mt-3">
                    <div class="card-body">

                        @php
                            $hasSecondarySub = (bool) (old('name_secondary', $subCategory->name_secondary) || old('short_description_secondary', $subCategory->short_description_secondary));
                        @endphp

                        <div class="d-flex gap-2 align-items-center border-bottom pb-2">
                            <i class="fa-solid fa-user"></i>
                            <h5 class="mb-0">
                                {{ __('Sub Category Information') }}
                            </h5>
                            <x-secondary-lang-toggle for="sub-category-edit" class="ms-auto" :checked="$hasSecondarySub" />
                        </div>

                        <div class="mt-3">
                            <label class="form-label">
                                {{ __('Select Category') }}
                                <span class="text-danger">*</span>
                            </label>
                            <select name="category[]" data-placeholder="Select Category" class="form-control select2"
                                multiple style="width: 100%" required>
                                <option value="" disabled>
                                    {{ __('Select Category') }}
                                </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ in_array($category->id, $subCategory->categories?->pluck('id')->toArray()) ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category')
                                <p class="text text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <x-input label="Name" name="name" :value="$subCategory->name" type="text"  placeholder="Name" required="true"/>
                        </div>

                        <x-secondary-lang-fields for="sub-category-edit" :show="$hasSecondarySub">
                            <div class="mt-3">
                                <x-input label="{{ __('Name') }} ({{ secondary_language_title() }})" name="name_secondary" :value="old('name_secondary', $subCategory->name_secondary)" type="text"  placeholder="{{ secondary_language_title() }} Name" />
                            </div>
                        </x-secondary-lang-fields>

                        <div class="mt-3">
                            <label for="short_description" class="form-label">{{ __('Short Description') }}</label>
                            <textarea name="short_description" id="short_description"
                                class="form-control @error('short_description') is-invalid @enderror" rows="3"
                                placeholder="{{ __('Enter short description') }}">{{ old('short_description', $subCategory->short_description) }}</textarea>
                            @error('short_description')
                                <p class="text text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>

                        <x-secondary-lang-fields for="sub-category-edit" :show="$hasSecondarySub">
                            <div class="mt-3">
                                <label for="short_description_secondary" class="form-label">{{ __('Short Description') }} ({{ secondary_language_title() }})</label>
                                <textarea name="short_description_secondary" id="short_description_secondary"
                                    class="form-control @error('short_description_secondary') is-invalid @enderror" rows="3"
                                    placeholder="Enter {{ secondary_language_title() }} short description">{{ old('short_description_secondary', $subCategory->short_description_secondary) }}</textarea>
                                @error('short_description_secondary')
                                    <p class="text text-danger m-0">{{ $message }}</p>
                                @enderror
                            </div>
                        </x-secondary-lang-fields>

                        <div class="mt-3">
                            <x-image-picker name="thumbnail" :value="$subCategory->sub_thumbnail ?? $subCategory->thumbnail" />
                        </div>

                        <div class="mt-5 d-flex gap-2 justify-content-between flex-wrap">
                            <a href="{{ route('admin.category.index') }}" class="btn btn-secondary py-2 px-4">
                                {{__('Back')}}
                            </a>

                            <button type="submit" class="btn btn-primary py-2 px-4">
                                {{__('Update') }}
                            </button>

                        </div>

                    </div>

                </div>
            </div>
        </div>

    </form>
@endsection
