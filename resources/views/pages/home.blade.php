@php use Illuminate\Support\Facades\Storage; @endphp
@extends('layouts.app')

@section('title', "Home Page")

@section('content')
    <div class="my-4">
        <h1>ImageEffects</h1>
        <p>It's a site that provides a set of filters for real-time image processing.</p>
        <video class="img-thumbnail" controls autoplay src="{{ Storage::url('ImageEffect.mp4') }}"></video>
    </div>


    <h2>Possibilities</h2>
    <div class="row row-cols-auto row-cols-md-3">
        <div class="col">
            <i class="feature bi bi-filter"></i>
            <p>Filters process images on the server without the need to reload the page.</p>
        </div>
        <div class="col">
            <i class="feature bi bi-download"></i>
            <p>Processed images are downloaded in better quality.</p>
        </div>
        <div class="col">
            <i class="feature bi bi-globe"></i>
            <p>The application is fully accessible for devices without JavaScript support.</p>
        </div>
    </div>
@endsection
