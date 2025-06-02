@extends('layouts.landing')

@section('content')

<!DOCTYPE html>
<br><br><br>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel Laundry</title>
    <link rel="stylesheet" href="{{ asset('assets/Blog/blog.css') }}">
</head>
<body>
    <div class="container">
        <h1>Artikel Laundry</h1>
        <br>
        <div class="grid-container">
            @foreach ($articles as $item)
                <div class="card">
                    <img src="{{ asset('thumbnails/' . $item->thumbnail_img) }}" alt="Laundry Artikel">
                    <div class="content">
                        <h3>{{ $item->title }}</h3>
                        <p>{{ Str::words($item->content, 5, '...') }}</p>
                        <a href="{{ route('landing.detailBlog', ['id' => $item->id]) }}" class="button">Lihat Detail</a>
                    </div>
                </div>
            @endforeach
            {{-- @for ($i = 1; $i <= 9; $i++)
                <div class="card">
                    <img src="{{ asset('assets/LandingPage/image/gsp7.jpg') }}" alt="Laundry Artikel">
                    <div class="content">
                        <h3>Judul Artikel Laundry {{ $i }}</h3>
                        <p>Deskripsi singkat artikel laundry {{ $i }} untuk memberikan solusi praktis...</p>
                        <a href="#" class="button">Lihat Detail</a>
                    </div>
                </div>
            @endfor --}}
        </div>
    </div>
</body>
</html>
@endsection
