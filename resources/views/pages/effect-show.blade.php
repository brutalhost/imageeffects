@php @endphp
@extends('layouts.app')
@section('title', 'Effect ' . $effect->title)

@section('content')
    <h1>
        {{ $effect->title }}
    </h1>

    @unless($hasImage)
        <div class="columns">
            <div class="col col-sm-8 col-lg-6 col-xl-4">
                @include('partials.forms.image-loader')
            </div>
        </div>

    @else
        <div id="image-editor" class="row mb-3">
            <div class="col-12 col-lg-6 mb-2">
                <div class="transparent-background ratio ratio-1x1 bg-primary-subtle mb-2">
                    @include('partials.preview-image')
                </div>
            </div>
            <div class="col-12 col-lg-6 sr">
                @include('partials.forms.effects._wrapper')
                <hr>
                @include('partials.forms.effects._controls')
            </div>
        </div>
    @endunless
@endsection
