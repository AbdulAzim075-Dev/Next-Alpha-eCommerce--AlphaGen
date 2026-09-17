@extends('layouts.app')
@section('header-title', __('Create New Category'))

@section('content')
    <div class="page-title">
        <div class="d-flex gap-2 align-items-center">
            <i class="fa-solid fa-border-all"></i> {{__('Create New Category')}}
        </div>
    </div>
    <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="card mt-3">
                    <div class="card-body">

                        @php
                            $hasSecondaryCategory = (bool) (old('name_secondary') || old('description_secondary'));
                        @endphp

                        <div class="d-flex gap-2 align-items-center border-bottom pb-2">
                            <i class="fa-solid fa-user"></i>
                            <h5 class="mb-0">
                                {{__('Category Information')}}
                            </h5>
                            <x-secondary-lang-toggle for="category-create" class="ms-auto" :checked="$hasSecondaryCategory" />
                        </div>

                        <div class="mt-3">
                            <x-input label="Name" name="name" type="text" placeholder="Enter Name" required="true"/>
                        </div>

                        <x-secondary-lang-fields for="category-create" :show="$hasSecondaryCategory">
                            <div class="mt-3">
                                <x-input label="{{ __('Name') }} ({{ secondary_language_title() }})" name="name_secondary" type="text" placeholder="Enter {{ secondary_language_title() }} name" :value="old('name_secondary')" />
                            </div>
                        </x-secondary-lang-fields>

                        <div class="mt-3">
                            <x-input label="Order By" name="order_by" type="number" placeholder="Enter category order" min="0" :value="old('order_by', 0)" />
                        </div>
                        <div class="mt-3">
                            <label class="form-label">
                                {{ __('Icon') }}
                                <span class="text-danger">*</span>
                            </label>
                            <x-image-picker name="icon" />
                            @error('icon')
                                <p class="text text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- <div class="mt-3">
                            <x-image-picker name="thumbnail" />
                        </div> --}}

                        <div class="mt-3">
                            <label class="form-label">
                                {{ __('Banner') }}
                            </label>
                            <x-image-picker name="banner" />
                            @error('banner')
                                <p class="text text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="description" class="form-label">
                                {{__('Description')}}
                            </label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Enter description">{{ old('description') }}</textarea>
                        </div>

                        <x-secondary-lang-fields for="category-create" :show="$hasSecondaryCategory">
                            <div class="mt-3">
                                <label for="description_secondary" class="form-label">
                                    {{ __('Description') }} ({{ secondary_language_title() }})
                                </label>
                                <textarea name="description_secondary" id="description_secondary" class="form-control" rows="3" placeholder="Enter {{ secondary_language_title() }} description">{{ old('description_secondary') }}</textarea>
                            </div>
                        </x-secondary-lang-fields>


                        <div class="mt-5 d-flex gap-2 justify-content-between flex-wrap">
                            <a href="{{ route('admin.category.index')}}" class="btn btn-secondary py-2 px-4">
                            {{__('Back')}}
                            </a>

                            <button type="submit" class="btn btn-primary py-2 px-4">
                                {{__('Submit')}}
                            </button>

                        </div>

                    </div>

                </div>
            </div>
        </div>

    </form>
@endsection
