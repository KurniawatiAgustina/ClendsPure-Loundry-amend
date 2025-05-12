@extends('layouts.landing')
{{-- @section('title')
    Home
@endsection --}}

@section('content')

<link rel="stylesheet" href="{{ asset('assets/LandingPage/styles.css') }}">
<br><br><br>
 <!-- Hero Section -->
<section id="home" class="hero">
    <div class="overlay"></div>
    <div class="slideshow-container">
        <!-- Slides -->
        <div class="slide-fade">
            <img src="{{ asset('assets/LandingPage/image/gsp7.jpg') }}" alt="Gallery Image">
        </div>
    </div>
    <div class="hero-content1">
        <h1>Solusi Terpercaya Perawatan <br> Sepatu Kesayangan Kamu.</h1>
        <p>Kami memberikan layanan terbaik untuk perawatan sepatu. Bekerja secara profesional, <br> menggunakan teknik
            khusus dengan alat dan bahan premium.</p>
        <a href="#services" class="cta-button1">Kunjungi Cleds Sekarang</a>
    </div>
</section>
<br>

<div class="container2">
    <div class="header">
        <h1>Promo Pilihan</h1>
        <p>Dapatkan promo-promo menarik, khusus buat kamu.</p>
    </div>

    <div class="promo-grid">
        @foreach ($displayPromos as $item)
            <div class="promo-card">
                <img src="{{ asset('display-promos/' . $item    ->thumbnail_img) }}" alt="Promo 1">
                <div class="promo-text">
                <h3><i class="bi bi-ui-radios"></i> {{ $item->title }}</h3>
                </div>
            </div>
        @endforeach

        {{-- <div class="promo-card">
            <img src="assets/LandingPage/image/promo2.png" alt="Promo 1">
            <div class="promo-text">
              <h3><i class="bi bi-ui-radios"></i> Cleds 4th Birthday!</h3>
            </div>
        </div>

        <div class="promo-card">
            <img src="assets/LandingPage/image/promo1.png" alt="Promo 2">
            <div class="promo-text">
                <h3>SAC MOVING CHALLENGE IS ON AGAIN!</h3>
            </div>
        </div>

        <div class="promo-card">
            <img src="assets/LandingPage/image/promo3.png" alt="Promo 3">
            <div class="promo-text">
                <h3>Heading to Brightspot</h3>
            </div>
        </div> --}}
    </div>

    <a href="#" class="view-all">Lihat Semua</a>
</div>

 <!-- bottom grid -->
<section id="pendahuluan" class="pendahuluan-section">
    <div class="container1">

        <!-- Bottom Grid -->
        <div class="bottom-grid">
            <div class="testimonial-card">
                <p class="quote-mark">"</p>
                <p class="testimonial-text">
                    Laundryshoe.id melayani jasa cuci sepatu premium dengan harga terjangkau, layanan cepat, hingga kualitas yang terjamin.
                </p>
                <p class="testimonial-text">
                    Konsultasikan layanan yang paling cocok untuk kamu di Laundryshoe.id.
                </p>
                <p class="testimonial-author">
                    Bagus Supratomo - Founder Laundryshoe.id
                </p>
            </div>
            <div class="image-container1">
                <img src="{{ asset('assets/LandingPage/image/gsp6.jpg') }}" alt="Gallery Image 1">
            </div>
            <div class="image-container1">
                <img src="{{ asset('assets/LandingPage/image/gsp7.jpg') }}" alt="Gallery Image 2">
            </div>
        </div>
    </div>
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
<br><br>
<br>

<!-- Pemesanan -->
<section class="order-online">
    <h2 class="section-title">Cara Pemesanan Melalui Online</h2>
    <div class="content">
      <div class="image-container">
        <img src="assets/LandingPage/image/gsp4.jpg" alt="Laundry Process">
      </div>
      <div class="steps">
        <div class="step">
          <div class="icon">
            <i class="bi bi-whatsapp"></i>
          </div>
          <div class="text">
            <h3>Chat melalui WhatsApp</h3>
            <p>Hubungi kami melalui WhatsApp, dan kirimkan lokasi penjemputan</p>
          </div>
        </div>
        <div class="step">
          <div class="icon">
            <i class="bi bi-truck"></i>
          </div>
          <div class="text">
            <h3>Penjemputan Laundry</h3>
            <p>Kami akan menjemput laundry di lokasi Anda</p>
          </div>
        </div>
        <div class="step">
          <div class="icon">
            <i class="bi bi-cash"></i>
          </div>
          <div class="text">
            <h3>Pembayaran</h3>
            <p>Kami akan menimbang dan menghitung jumlah pakaian Anda</p>
          </div>
        </div>
        <div class="step">
          <div class="icon">
            <i class="bi bi-gear"></i>
          </div>
          <div class="text">
            <h3>Pengerjaan</h3>
            <p>Kami akan memproses mengerjakan laundry Anda</p>
          </div>
        </div>
        <div class="step">
          <div class="icon">
            <i class="bi bi-house"></i>
          </div>
          <div class="text">
            <h3>Pengantaran Laundry</h3>
            <p>Kami antarkan laundry yang sudah kami kerjakan ke tempat Anda</p>
          </div>
        </div>
      </div>
    </div>
  </section>




    <!-- Statistik -->
    <div class="statistics">
        <div class="stat-card">
            <h3>30.3K</h3>
            <p>Students Enrolled</p>
        </div>
        <div class="stat-card">
            <h3>40.5K</h3>
            <p>Classes Completed</p>
        </div>
        <div class="stat-card">
            <h3>88.9%</h3>
            <p>Satisfaction Rate</p>
        </div>
        <div class="stat-card">
            <h3>6.3+</h3>
            <p>Top Instructors</p>
        </div>
    </div>
</div>


@endsection
{{-- @include('layouts.footer') --}}
</section>
</body>

<script>
function renderPromosFromBackend() {
    fetch('API_ENDPOINT') // Ganti dengan URL endpoint API Anda
        .then(response => response.json())
        .then(data => {
            const promoGrid = document.getElementById('promoGrid');
            promoGrid.innerHTML = ''; // Kosongkan isi sebelumnya

            data.forEach(promo => {
                const promoCard = document.createElement('div');
                promoCard.className = 'promo-card';

                promoCard.innerHTML = `
                    <div class="promo-image" style="background-image: url('${promo.image}');">
                        <span>${promo.title}</span>
                    </div>
                    <div class="promo-content">
                        <h3>${promo.title}</h3>
                        <p>${promo.description}</p>
                    </div>
                `;

                promoGrid.appendChild(promoCard);
            });
        })
        .catch(error => console.error('Error fetching promo data:', error));
}
function navigateToServicePage(service) {
    // Simulasikan navigasi ke halaman baru dengan parameter layanan
    window.location.href = `service-details.html?service=${encodeURIComponent(service)}`;
  }

    // Ambil parameter "service" dari URL
    const urlParams = new URLSearchParams(window.location.search);
    const service = urlParams.get('service');

    // Tampilkan konten berdasarkan parameter
    const serviceTitle = document.getElementById('service-title');
    const serviceDescription = document.getElementById('service-description');

    if (service) {
      serviceTitle.textContent = service;

      // Tambahkan deskripsi sesuai layanan
      if (service === 'Laundry Satuan') {
        serviceDescription.textContent = 'Layanan laundry untuk pakaian satuan, mulai dari Rp. 25.000.';
      } else if (service === 'Laundry Kiloan') {
        serviceDescription.textContent = 'Layanan laundry kiloan dengan harga ekonomis, mulai dari Rp. 10.000.';
      } else if (service === 'Laundry Karpet') {
        serviceDescription.textContent = 'Layanan laundry untuk karpet, menjaga kebersihan dan kenyamanan rumah Anda.';
      } else {
        serviceDescription.textContent = 'Detail layanan tidak ditemukan.';
      }
    } else {
      serviceTitle.textContent = 'Layanan Tidak Ditemukan';
      serviceDescription.textContent = 'Silakan pilih layanan dari halaman utama.';
    }

    function changeBackground(cardElement, imageUrl) {
    cardElement.classList.add('clicked');
    cardElement.style.backgroundImage = `url(${imageUrl})`;
}

// Panggil fungsi untuk render promo
renderPromosFromBackend();
</script>
