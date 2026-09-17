@props([
    'for' => 'secondary-language',
    'label' => null,
    'checked' => false,
])
<div {{ $attributes->class('d-flex justify-content-end') }}>
    <div class="form-check form-switch mb-0">
        <input class="form-check-input secondary-lang-toggle" type="checkbox" role="switch"
            id="{{ $for }}" data-secondary-toggle="{{ $for }}" @checked($checked)>
        <label class="form-check-label fw-semibold user-select-none cursor-pointer" for="{{ $for }}">
            {{ $label ?? __('Add :lang Language Details', ['lang' => secondary_language_title()]) }}
        </label>
    </div>
</div>