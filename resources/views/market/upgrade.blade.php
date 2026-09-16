@extends('layouts.app')

@section('header-title', __('Support & Updates'))
@section('header-subtitle', __('Manage Support & Updates'))
@section('content')
<section class="support_container">
    <header class="page_header">
<div class=" border-b">
                <p class="header_title">{{ __('Product Support') }}</p>
                <a href="mailto:support@alphagen.dev" class="common_btn">{{ __('Get Support') }}</a>
            </div>

        <!-- tabs  -->
        <div class="tab_container">
            <button class="btn_tab btn_tab_active">{{ __('Product Update') }}</button>
            <a href="{{ route('marketplace.index') }}" class="btn_tab">{{ __('Marketplace') }} </a>
            <a href="{{ route('marketplace.addons') }}" class="btn_tab">{{ __("My Addon's") }}</a>
        </div>
    </header>
    <section class="marketplace_section_container">
        <div class="section_container ">
            <div class="card p-4">
                <p class="section_title mb-3">{{ __('Current Version') }}: v{{ config('app.version') }}</p>
                <p class="mb-0">{{ __('No remote update channel configured. Apply update commands from General Settings.') }}</p>
            </div>
        </div>
    </section>
</section>
@endsection