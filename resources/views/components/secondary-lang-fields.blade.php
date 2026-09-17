@props([
    'for' => 'secondary-language',
    'show' => false,
])
<div data-secondary-fields="{{ $for }}" @class(['secondary-lang-fields', 'd-none' => ! $show])>
    {{ $slot }}
</div>