@extends('layouts.landing')
{{-- @section('title')
    Home
@endsection --}}

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <!-- Link to Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/Layanan/layanan.css') }}">
</head>
<body>

<br><br><br>

<!-- Judul dan Deskripsi -->
<div class="content-wrapper">
  <!-- Judul -->
  <div class="title-section">
      <h2>Bagaimana Kami Merawat Barang Kesayanganmu?</h2>
  </div>
  <!-- Deskripsi -->
  <div class="description-section">
      <p>
          Shoes and Care merupakan jasa perawatan dan cuci sepatu premium pertama di Indonesia yang berbasis media
          sosial. Sampai saat ini, Shoes and Care sudah memiliki lebih dari 70 cabang di seluruh Indonesia.
      </p>
  </div>
</div>
<br>



<!-- Fitur-fitur Layanan -->
<div class="features">
  <div class="feature-card">
      <div class="icon">🛡️</div>
      <h3>Ditangani oleh Ahli</h3>
      <p>Berpengalaman lebih dari 10 tahun di industri jasa cuci sepatu.</p>
  </div>
  <div class="feature-card">
      <div class="icon">🎧</div>
      <h3>Dukungan Customer Service</h3>
      <p>Selalu siap membantu kamu. Kapan pun, di mana pun.</p>
  </div>
  <div class="feature-card">
      <div class="icon">🚚</div>
      <h3>Gratis Jemput & Antar</h3>
      <p>Layanan antar jemput gratis hingga 5 KM dari lokasi kamu.</p>
  </div>
  <div class="feature-card">
      <div class="icon">✅</div>
      <h3>Jaminan Garansi Layanan</h3>
      <p>Jaminan garansi apabila terjadi kerusakan selama pelayanan.</p>
  </div>
</div>
</div>


  <section class="containerr">
    <div class="layout-wrapper">
      <!-- Description Section -->
      <section class="description">
        <h2>Syarat & Ketentuan Gratis Ongkir</h2>
        <p>Happy Laundry memberikan layanan gratis antar-jemput laundry dengan syarat dan ketentuan berlaku. Berikut ini untuk melihat daftar fasilitas antar-jemput sesuai jarak melalui aplikasi googlemaps.</p>
      </section>

      <!-- Table Section -->
      <section class="table-wrapper">
        <table class="pricing-table">
          <thead>
            <tr class="table-header">
              <th>Radius</th>
              <th>Min. Transaksi</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            <tr class="table-header1">
              <td>0-2 km</td>
              <td>Rp 50.000</td>
              <td>Free Ongkir</td>
            </tr>
            <tr>
              <td>3-7 km<br>+ free 2 km</td>
              <td>Rp 50.000</td>
              <td>Rp 6.000/km</td>
            </tr>
            <tr>
              <td>8-12 km<br>+ free 2 km</td>
              <td>Rp 70.000</td>
              <td>Rp 5.000/km</td>
            </tr>
            <tr>
              <td>13-17 km<br>+ free 2 km</td>
              <td>Rp 100.000</td>
              <td>Rp 4.000/km</td>
            </tr>
          </tbody>
        </table>
      </section>
</section>



   <!-- Layanan -->

<section class="layanan-kami">
  <h1>Layanan Kami</h1>
  <br>
  <div class="container">
    @foreach ($displayServices as $item)
      <div class="card" style="background: url('assets/LandingPage/image/gsp7.jpg') center/cover no-repeat;">
          <h3>{{ $item->title }}</h3>
          <p>Mulai dari {{ $item->Harga }}</p>
          <button>Lihat Detail</button>
      </div>
    @endforeach
      {{-- <div class="card" style="background: url('assets/LandingPage/image/gsp7.jpg') center/cover no-repeat;">
          <h3>Laundry Satuan</h3>
          <p>Mulai dari Rp. 25,000</p>
          <button onclick="location.href='laundry-satuan.html'">Lihat Detail</button>
      </div>
      <div class="card" style="background: url('assets/LandingPage/image/gsp7.jpg') center/cover no-repeat;">
          <h3>Laundry Kiloan</h3>
          <p>Mulai dari Rp. 10,000</p>
          <button onclick="location.href='laundry-kiloan.html'">Lihat Detail</button>
      </div>
      <div class="card" style="background: url('assets/LandingPage/image/gsp7.jpg') center/cover no-repeat;">
          <h3>Laundry Karpet</h3>
          <p>Mulai dari Rp. 40,000</p>
          <button onclick="location.href='laundry-karpet.html'">Lihat Detail</button>
      </div>
      <div class="card" style="background: url('assets/LandingPage/image/gsp7.jpg') center/cover no-repeat;">
          <h3>Laundry Sepatu</h3>
          <p>Mulai dari Rp. 35,000</p>
          <button onclick="location.href='laundry-sepatu.html'">Lihat Detail</button>
      </div>
      <div class="card" style="background: url('assets/LandingPage/image/gsp7.jpg') center/cover no-repeat;">
          <h3>Stroller & Baby Care</h3>
          <p>Mulai dari Rp. 20,000</p>
          <button onclick="location.href='stroller-baby-care.html'">Lihat Detail</button>
      </div>
      <div class="card" style="background: url('assets/LandingPage/image/gsp7.jpg') center/cover no-repeat;">
          <h3>Cuci Bantal/Bed Cover/Selimut</h3>
          <p>Mulai dari Rp. 25,000</p>
          <button onclick="location.href='cuci-bantal.html'">Lihat Detail</button>
      </div> --}}
  </div>
</section>

<section class="client-feedback">
  <h2 class="section-title">Client Feedback & Reviews Pelanggan Happy Laundry</h2>
  <div class="feedback-container">
    <div class="feedback-card">
      <p class="feedback-text">Iseng2 laundry disini kemarin.. Hasilnya bagus juga ternyata, hehe.. Makasih om.</p>
      <div class="client-info">
        <img src="assets/LandingPage/image/gsp7.jpg" alt="Asril" class="client-photo">
        <div>
          <h4 class="client-name">Asril</h4>
          <p class="client-job">Karyawan Swasta</p>
        </div>
      </div>
      <i class="quote-icon">❝</i>
    </div>
    <div class="feedback-card">
      <p class="feedback-text">Bersih, wangi, pelayanan ramah, ada layanan antar-jemput. TOP!</p>
      <div class="client-info">
        <img src="assets/LandingPage/image/gsp7.jpg" alt="Lela" class="client-photo">
        <div>
          <h4 class="client-name">Santono</h4>
          <p class="client-job">PNS</p>
        </div>
      </div>
      <i class="quote-icon">❝</i>
    </div>
    <div class="feedback-card">
      <p class="feedback-text">
        Awalnya saya memang sedang mencari tempat laundry. Saya pikir di kost saya belum ada. Karena tempatnya dekat banget, saya iseng untuk coba mencuci sneakers saya dan ternyata bisa juga untuk perawatan lainnya.
        Dan saya sangat puas dengan hasilnya. Dengan harga yang terjangkau, hasilnya sangat memuaskan. Thank you Happy Laundry!
      </p>
      <div class="client-info">
        <img src="assets/LandingPage/image/gsp7.jpg" alt="Santoso" class="client-photo">
        <div>
          <h4 class="client-name">Lela</h4>
          <p class="client-job">Mahasiswa</p>
        </div>
      </div>
      <i class="quote-icon">❝</i>
    </div>
  </div>
</section>

<br><br>
    </body>
    </html>

@endsection
