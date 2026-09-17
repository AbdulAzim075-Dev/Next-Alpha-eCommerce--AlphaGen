@extends('layouts.app')

@section('header-title', __('Edit') . ' ' . __($page->title))

@section('content')
    <div class="container-fluid mb-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
            <h4 class="m-0">{{ __('Edit') }} {{ __($page->title) }}</h4>

            <a href="{{ url()->previous() }}" class="btn btn-sm btn-danger">
                <i class="fa fa-arrow-left"></i>
                {{ __('Back') }}
            </a>
        </div>

        <form action="{{ route('admin.legalPage.update', $page?->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card border-0 rounded-12">
                <div class="card-body">
                    <div>
                        <x-input name='title' type="text" placeholder="Title" value="{{ $page->title }}"
                            label="Title" />
                    </div>

                    @php
                        $hasSecondaryLegal = (bool) (old('title_secondary', $page->title_secondary) || old('description_secondary', $page->description_secondary));
                    @endphp
                    <x-secondary-lang-toggle for="legal-page-edit" :checked="$hasSecondaryLegal" />

                    <x-secondary-lang-fields for="legal-page-edit" :show="$hasSecondaryLegal">
                        <div class="mt-3">
                            <x-input name='title_secondary' type="text" placeholder="{{ secondary_language_title() }} Title"
                                value="{{ old('title_secondary', $page->title_secondary) }}" label="{{ __('Title') }} ({{ secondary_language_title() }})" />
                        </div>
                    </x-secondary-lang-fields>

                    <div class="mt-3">
                        <label for="editor" class="fw-bold">{{ __('Content') }}</label>

                        <div id="editor">
                            {!! old('description') ?? $page->description !!}
                        </div>
                        <input type="hidden" id="description" name="description" value="{{ old('description') ?? $page->description }}">
                        @error('description')
                            <p class="text text-danger m-0">{{ $message }}</p>
                        @enderror
                    </div>

                    <x-secondary-lang-fields for="legal-page-edit" :show="$hasSecondaryLegal">
                        <div class="mt-4">
                            <label for="editor_secondary" class="fw-bold">{{ __('Content') }} ({{ secondary_language_title() }})</label>

                            <div id="editor_secondary" style="min-height: 200px">
                                {!! old('description_secondary', $page->description_secondary) !!}
                            </div>
                            <input type="hidden" id="description_secondary" name="description_secondary"
                                value="{{ old('description_secondary', $page->description_secondary) }}">
                            @error('description_secondary')
                                <p class="text text-danger m-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </x-secondary-lang-fields>

                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-primary px-4 py-2" type="submit">{{ __('Save And Update') }}</button>
                </div>
            </div>
        </form>

    </div>
@endsection
@push('scripts')
    <script>
        const quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        'header': [1, 2, 3, 4, 5, 6, false]
                    }],
                    [{
                        'font': []
                    }],
                    ['bold', 'italic', 'underline', 'strike', 'blockquote'],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    [{
                        'align': []
                    }],
                    [{
                        'script': 'sub'
                    }, {
                        'script': 'super'
                    }],
                    [{
                        'indent': '-1'
                    }, {
                        'indent': '+1'
                    }],
                    [{
                        'direction': 'rtl'
                    }],
                    [{
                        'color': []
                    }, {
                        'background': []
                    }],
                    ['link', 'image', 'video', 'formula']
                ]
            }
        });

        quill.on('text-change', function(delta, oldDelta, source) {
            document.getElementById('description').value = quill.root.innerHTML;
        });

        const quillSecondary = new Quill('#editor_secondary', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        'header': [1, 2, 3, 4, 5, 6, false]
                    }],
                    [{
                        'font': []
                    }],
                    ['bold', 'italic', 'underline', 'strike', 'blockquote'],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    [{
                        'align': []
                    }],
                    [{
                        'script': 'sub'
                    }, {
                        'script': 'super'
                    }],
                    [{
                        'indent': '-1'
                    }, {
                        'indent': '+1'
                    }],
                    [{
                        'direction': 'rtl'
                    }],
                    [{
                        'color': []
                    }, {
                        'background': []
                    }],
                    ['link', 'image', 'video', 'formula']
                ]
            }
        });

        quillSecondary.on('text-change', function(delta, oldDelta, source) {
            document.getElementById('description_secondary').value = quillSecondary.root.innerHTML;
        });
    </script>
@endpush
