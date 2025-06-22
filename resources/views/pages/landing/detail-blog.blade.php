@extends('layouts.landing')

@section('content')
<div class="container py-5 mt-5">
    <div class="row mb-4">
        <div class="col">
            <h1 class="fw-bold text-center">{{ $article->title }}</h1>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col text-center">
            <img
                src="{{ asset('thumbnails/' . $article->thumbnail_img) }}"
                alt="Thumbnail {{ $article->title }}"
                class="img-fluid rounded shadow-sm"
                style="max-height: 300px; object-fit: cover;"
            >
        </div>
    </div>

    <div class="row">
        <div class="col">
            <textarea
                class="w-100 p-0 border-0"
                readonly
                style="
                    background: transparent;
                    resize: none;
                    line-height: 1.6;
                    font-size: 1rem;
                    min-height: 400px;
                "
            >{{ $article->content }}</textarea>
        </div>
    </div>
</div>
@endsection
