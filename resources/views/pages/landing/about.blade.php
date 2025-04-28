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
                    <h2>We Are Always Think On Your Dream</h2>
                    <p>
                      Many students residentials completely focus on sustainable building practices, incorporating user-friendly modern design and efficient systems.
                    </p>
                    <ul>
                      <li><strong>WORLDWIDE SERVICES</strong><br>They provide quality services to expand your company.</li>
                      <li><strong>BEST COMPANY AWARD WINNER</strong><br>A reliable construction company is critical to managing budget and construction efficiency.</li>
                    </ul>
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

<section class="history">
    <div class="timeline">
      <div class="line"></div> <!-- Garis vertikal di tengah -->

      <div class="timeline-item">
        <div class="content">
          <img src="{{ asset('assets/LandingPage/image/gsp7.jpg') }}" alt="Gallery Image 2">
          <p>Company is founded as Maschinenfabrik Lehner Alwin GmbH in Hard (Austria).</p>
        </div>
        <div class="dot"></div>
        <div class="year">1955</div>
      </div>

      <div class="timeline-item">
        <div class="year">1958</div>
        <div class="dot"></div>
        <div class="content">
          <img src="{{ asset('assets/LandingPage/image/gsp7.jpg') }}" alt="Gallery Image 2">
          <p>Alwin Lehner designs and builds the company's first in-house machine—the legendary diplomat.</p>
        </div>
      </div>

      <div class="timeline-item">
        <div class="content">
          <img src="{{ asset('assets/LandingPage/image/gsp7.jpg') }}" alt="Gallery Image 2">
          <p>The first bottle for plant cleaners produced by the Alpla company.</p>
        </div>
        <div class="dot"></div>
        <div class="year">1958</div>
      </div>

      <div class="timeline-item">
        <div class="year">1964</div>
        <div class="dot"></div>
        <div class="content">
          <img src="{{ asset('assets/LandingPage/image/gsp7.jpg') }}" alt="Gallery Image 2">
          <p>First branch outside of Austria opens in Markdorf (Germany).</p>
        </div>
      </div>
    </div>
  </section>
  <BR>
  <!-- Course and Study Program Section -->
<section class="courses">
    <h2>Course And Study Program</h2>
    <div class="courses-container">
        <div class="course-item">
            <i class="fas fa-book"></i>
            <h3>Public Courses</h3>
        </div>
        <div class="course-item">
            <i class="fas fa-graduation-cap"></i>
            <h3>Undergraduate Courses</h3>
        </div>
        <div class="course-item">
            <i class="fas fa-chalkboard-teacher"></i>
            <h3>Master's Courses</h3>
        </div>
        <div class="course-item">
            <i class="fas fa-flask"></i>
            <h3>Postgraduate Research</h3>
        </div>
        <div class="course-item">
            <i class="fas fa-user-tie"></i>
            <h3>Become Lecturer</h3>
        </div>
    </div>

</section>

<section class="gallery1">
  <div class="image-container">
    <!-- Gambar-gambar asli -->
    <img src="{{ asset('assets/LandingPage/image/gsp7.jpg') }}" alt="Gallery Image 1">
    <img src="{{ asset('assets/LandingPage/image/gsp7.jpg') }}" alt="Gallery Image 2">
    <img src="{{ asset('assets/LandingPage/image/gsp7.jpg') }}" alt="Gallery Image 3">
    <img src="{{ asset('assets/LandingPage/image/gsp7.jpg') }}" alt="Gallery Image 4">
    <img src="{{ asset('assets/LandingPage/image/gsp7.jpg') }}" alt="Gallery Image 5">
    <img src="{{ asset('assets/LandingPage/image/gsp7.jpg') }}" alt="Gallery Image 6">

    <!-- Duplikasi gambar untuk seamless scroll -->
    <img src="{{ asset('assets/LandingPage/image/gsp7.jpg') }}" alt="Gallery Image 1">
    <img src="{{ asset('assets/LandingPage/image/gsp7.jpg') }}" alt="Gallery Image 2">
    <img src="{{ asset('assets/LandingPage/image/gsp7.jpg') }}" alt="Gallery Image 3">
    <img src="{{ asset('assets/LandingPage/image/gsp7.jpg') }}" alt="Gallery Image 4">
    <img src="{{ asset('assets/LandingPage/image/gsp7.jpg') }}" alt="Gallery Image 5">
    <img src="{{ asset('assets/LandingPage/image/gsp7.jpg') }}" alt="Gallery Image 6">
  </div>
</section>

</body>
</html>
@endsection
