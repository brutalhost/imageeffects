@extends('layouts.app')
@section('title', 'Effects list')

@section('content')
    <h1>Effects List</h1>
    <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
        @foreach($effects as $item)
            <div class="col">
                <div class="card h-100">
                    <img class="card-img-top d-block img-fit-contain"
                                       src="{{ Croppa::url(Storage::url('effects-images/'.$item->image), 640, 360) }}"
                                       alt="{{ $item->title }} preview image"/>
                    <div class="card-body d-flex flex-column p-4">
                        <h4 class="card-title">{{ $item->title }}</h4>
                        <p class="card-text">{{ Str::limit($item->description, 100) }}</p>
                        <a class="btn btn-primary mt-auto" href="{{ route('effects.show', ['effect' => $item]) }}">Go to
                            effect</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
