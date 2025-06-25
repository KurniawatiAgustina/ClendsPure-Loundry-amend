@extends('layouts.landing')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <title>Installation Services</title>
    <link rel="stylesheet" href="{{ asset('assets/About_us/about_us.css') }}">
</head>
<body>
<br><br><br>

            <div class="container">
                <div class="left-section">
                  <img src="{{ asset('assets/LandingPage/image/gsp5.jpg') }}" alt="Gallery Image 2">
                  <div class="small-images">
                    <img src="{{ asset('assets/LandingPage/image/gsp7.jpg') }}" alt="Gallery Image 2">
                  </div>
                </div>
                <div class="right-section">
                  <div class="highlight">
                    <h1>25+</h1>
                    <p>Years Experience<br>In Construction Company</p>
                  </div>
                  <div class="text-content">
                    <h2>{{ $displayAboutSlides->title }}</h2>
                    <p>
                      {{ $displayAboutSlides->description }}
                    </p>
                    {{-- <ul>
                      <li><strong>WORLDWIDE SERVICES</strong><br>They provide quality services to expand your company.</li>
                      <li><strong>BEST COMPANY AWARD WINNER</strong><br>A reliable construction company is critical to managing budget and construction efficiency.</li>
                    </ul> --}}
                    <button class="cta-button">KNOW MORE</button>
                  </div>
                </div>
              </div>
    </section>
<br>
<div class="hero-section">
  <div class="hero-content">
      <h1>Solusi Kebersihan Sepatu</h1>
      <h1>dan Peralatan Lainnya</h1>
      <div class="purple-line"></div>
      <div class="header-tag">
          APA ITU CLEDS?
      </div>
      <p class="hero-text">
          Apakah sepatu kesayangan Anda kotor dan membutuhkan
          <br/>
          sedikit perawatan ekstra? Kami di sini untuk membantu!
          <br/>
          Dengan pengalaman bertahun-tahun dalam merawat berbagai
          <br/>
          <br>
          jenis sepatu, kami menawarkan layanan cuci sepatu
          <br/>
          yang profesional dan berkualitas tinggi.
      </p>
      <button class="discover-btn">DISCOVER MORE</button>
  </div>
</div>


    <!-- Ganti bagian timeline di about.blade.php -->
<div class="timeline">
    <div class="line"></div>

    @foreach ($displayTimelines as $index => $item)
        <div class="timeline-item">
            <div class="content">
                <img src="{{ asset('display-timlines/' . $item->thumbnail_img) }}" alt="{{ $item->title }}">
                <p>{{ $item->title }}</p>
            </div>
            <div class="dot"></div>
        </div>
    @endforeach
</div>
        
    


<section class="gallery1">
  <div class="image-container">
    <!-- Gambar-gambar asli -->
    @foreach ($displayAboutGaleries as $item)
        <img src="{{ asset('thumbnails/' . $item->thumbnail_img) }}" alt="Gallery Image 1">
    @endforeach
    </div>
</section>

</body>
</html>
@endsection
