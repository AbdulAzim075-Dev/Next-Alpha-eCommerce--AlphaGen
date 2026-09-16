@extends('layouts.app')

@section('header-title', __('Marketplace'))
@section('header-subtitle', __('Our all products'))
@section('content')
    <section class="support_container">
        <header class="page_header">
            <div class=" border-b">
                <p class="header_title">{{ __('Product Support') }}</p>
                <a href="mailto:support@alphagen.dev" class="common_btn">{{ __('Get Support') }}</a>
            </div>

            <!-- tabs  -->
            <div class="tab_container">
                <a href="{{ route('marketplace.upgrade') }}" class="btn_tab">{{ __('Product Update') }}</a>
                <button class="btn_tab btn_tab_active">{{ __('Marketplace') }} </button>
                <a href="{{ route('marketplace.addons') }}" class="btn_tab">{{ __("My Addon's") }}</a>
            </div>

        </header>
        <section class="marketplace_section_container">
            <div class="section_container ">
                <div class="card p-4">
                    <p class="mb-0">{{ __('No marketplace configured. Install addons from the My Addons page.') }}</p>
                </div>
            </div>
        </section>
    </section>
@endsection