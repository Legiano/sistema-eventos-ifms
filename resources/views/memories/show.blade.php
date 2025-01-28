@extends('layouts.main-memories')

@section('title', $memory->title)

@section('content')

<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/img/memories/{{ $memory->image }}" class="img-fluid" alt="{{ $memory->title }}">
        </div>
        <div>
            <h1>{{ $memory->title }}</h1>
            <p>{{ $memory->text }}</p>
        </div>
    </div>

    <div class="col-md-12" id="gallery-container">
        @php
            if (is_string($memory->gallery)) {
                $photos = explode(',', trim($memory->gallery, '"'));
            } elseif (is_array($memory->gallery)) {
                $photos = $memory->gallery;
            } else {
                $photos = [];
            }
        @endphp
        @foreach($photos as $photo)
            <img src="/img/memories/{{ $photo }}" alt="{{ $memory->title }}">
        @endforeach
    </div>
</div>
</div>

@endsection
