@extends('layouts.landing')
{{-- @section('title')
    Home
@endsection --}}

@section('content')
<link rel="stylesheet" href="{{ asset('assets/Store/store.css') }}">

<div id="preloader">
    <img src="{{ '/assets/images/logo.jpg' }}" alt="Loading...">
</div>


<div class="info container-fluid text-center p-0">
  <div class="row g-0 align-items-start">
      <div class="peta col-lg-8 col-md-12 p-4">
          <iframe id="mapIframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.0859780476258!2d112.75439447404227!3d-7.344241872244963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb255b4a33d9%3A0x7e9a4d14b6b79322!2sPT.%20Rapid%20Plast%20Indonesia%20Plant%201!5e0!3m2!1sid!2sid!4v1724058025981!5m2!1sid!2sid"
              allowfullscreen="" loading="lazy"></iframe>
      </div>

      <div class="col-lg-4 col-md-12 d-flex flex-column align-items-stretch overflow-auto" style="height: 100vh; overflow-y: auto;">
        <div id="plant1" class="box-plant card active p-4" style="border-radius: 0; height: 200px;" onclick="changeMap(1)">
            <div class="card-body">
                <h6 style="text-align: start">Jl. R Moh. Mangundiprojo No.20, Sawahan, Buduran, Kec. Buduran, Kabupaten Sidoarjo, Jawa Timur 61252, Indonesia</h6>
                <p class="phone-number" style="text-align: start; padding-top: 15px;"><i class="bi bi-telephone-fill" style="margin-right: 10px;"></i>081333539691</p>
            </div>
        </div>
          <div id="plant2" class="box-plant card" style="border-radius: 0; height: 200px;" onclick="changeMap(2)">
              <div class="card-body">
                  <h6 style="text-align: start">Jl. Raya Pabean No.17, Dabean, Pabean, Kec. Sedati, Kabupaten Sidoarjo, Jawa Timur 61253, Indonesia </h6>
                  <p class="phone-number" style="text-align: start; padding-top: 15px;"><i class="bi bi-telephone-fill" style="margin-right: 10px;"></i>081333539691</p>
              </div>
          </div>
          <div id="plant3" class="box-plant card" style="border-radius: 0; height: 200px;" onclick="changeMap(3)">
              <div class="card-body">
                  <h6 style="text-align: start">Jl. Joyoboyo No.51, Bungur, Medaeng, Kec. Waru, Kabupaten Sidoarjo, Jawa Timur 61256</h6>
                  <p class="phone-number" style="text-align: start; padding-top: 15px;"><i class="bi bi-telephone-fill" style="margin-right: 10px;"></i>085755844078</p>
              </div>
          </div>
          <div id="plant4" class="box-plant card" style="border-radius: 0; height: 200px;" onclick="changeMap(4)">
              <div class="card-body">
                  <h6 style="text-align: start">Jl. Pahlawan No.40, RW.Babalayar, Rw5, Sidokumpul, Kec. Sidoarjo, Kabupaten Sidoarjo, Jawa Timur 61212</h6>
                  <p class="phone-number" style="text-align: start; padding-top: 15px;"><i class="bi bi-telephone-fill" style="margin-right: 10px;"></i>085755844078</p>
              </div>
          </div>
          <div id="plant5" class="box-plant card" style="border-radius: 0; height: 200px;" onclick="changeMap(5)">
              <div class="card-body">
                  <h6 style="text-align: start">Jl. Siwalankerto Timur No.176, RT.02/RW.05, Siwalankerto, Kec. Wonocolo, Surabaya, Jawa Timur 60236</h6>
                  <p class="phone-number" style="text-align: start; padding-top: 15px;"><i class="bi bi-telephone-fill" style="margin-right: 10px;"></i>081326415371</p>
              </div>
          </div>
          <div id="plant6" class="box-plant card" style="border-radius: 0; height: 200px;" onclick="changeMap(6)">
              <div class="card-body">
                  <h6 style="text-align: start">Jl. Nginden Semolo No.8, Semolowaru, Kec. Sukolilo, Surabaya, Jawa Timur 60292, Indonesia</h6>
                  <p class="phone-number" style="text-align: start; padding-top: 15px;"><i class="bi bi-telephone-fill" style="margin-right: 10px;"></i>0816530022</p>
              </div>
          </div>
      </div>
  </div>
</div>

{{-- <section class="foto1">
  <div class="image-container">
    <!-- Gambar-gambar asli -->
    @foreach ($displayFotoStore as $item)
        <img src="{{ asset('thumbnails/' . $item->thumbnail_img) }}" alt="foto 1">
    @endforeach
    </div>
</section>

<section class="foto2">
  <div class="image-container">
    <!-- Gambar-gambar asli -->
    @foreach ($displayFotoStore2 as $item)
        <img src="{{ asset('thumbnails/' . $item->thumbnail_img) }}" alt="foto 2">
    @endforeach
    </div>
</section>

<section class="foto3">
  <div class="image-container">
    <!-- Gambar-gambar asli -->
    @foreach ($displayFotoStore3 as $item)
        <img src="{{ asset('thumbnails/' . $item->thumbnail_img) }}" alt="foto 3">
    @endforeach
    </div>
</section> --}}



<script>
  function changeMap(id) {
      const mapUrls = {
          1: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.3069089440173!2d112.71902067481479!3d-7.431250092579473!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e6a985efc9df%3A0xb9eb2f6d51a013d9!2sJl.%20R%20Moh.%20Mangundiprojo%20No.20%2C%20Sawahan%2C%20Buduran%2C%20Kec.%20Buduran%2C%20Kabupaten%20Sidoarjo%2C%20Jawa%20Timur%2061252!5e0!3m2!1sid!2sid!4v1749572136018!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade',
          2: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.8380663905864!2d112.76067537481414!3d-7.372039992637302!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e51df97d6af9%3A0xd562e34dc8f6a9de!2sJl.%20Raya%20Pabean%20No.17%2C%20Dabean%2C%20Pabean%2C%20Kec.%20Sedati%2C%20Kabupaten%20Sidoarjo%2C%20Jawa%20Timur%2061253!5e0!3m2!1sid!2sid!4v1749572325396!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade',
          3: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.971861895517!2d112.71760717481392!3d-7.3570505926519045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e4a8c4f5f763%3A0x32c799be5b0becec!2sJl.%20Joyoboyo%20No.51%2C%20Bungur%2C%20Medaeng%2C%20Kec.%20Waru%2C%20Kabupaten%20Sidoarjo%2C%20Jawa%20Timur%2061256!5e0!3m2!1sid!2sid!4v1749572454992!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade',
          4: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1978.0647147031607!2d112.70998746156693!3d-7.450930106695481!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e135775b2db1%3A0xa3f993a82dfad155!2sTaman%20Makam%20Pahlawan%20Kota%20Sidoarjo!5e0!3m2!1sid!2sid!4v1749572539335!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade',
          5: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.149842919684!2d112.73575427481367!3d-7.33706379267145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb47e5629263%3A0x4c44faf0db84ea13!2sJl.%20Siwalankerto%20Timur%20No.176%2C%20Siwalankerto%2C%20Kec.%20Wonocolo%2C%20Surabaya%2C%20Jawa%20Timur%2060236!5e0!3m2!1sid!2sid!4v1749572587154!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade',
          6: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.4828287954288!2d112.76019437481334!3d-7.2995241927081205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbaccb159807%3A0xc68d711c8030b9f6!2sJl.%20Nginden%20Semolo%20No.8%2C%20Nginden%20Jangkungan%2C%20Kec.%20Sukolilo%2C%20Surabaya%2C%20Jawa%20Timur%2060118!5e0!3m2!1sid!2sid!4v1749572665255!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade'
      };

      document.getElementById('mapIframe').src = mapUrls[id];

      const cards = document.querySelectorAll('.box-plant');
      cards.forEach(function(card) {
          card.classList.remove('active');
      });

      document.getElementById('plant' + id).classList.add('active');
  }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    const elements = document.querySelectorAll('.fade-in-up');

    function checkPosition() {
        elements.forEach(element => {
            const position = element.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;

            if (position < windowHeight - 50) {
                element.classList.add('show');
            }
        });
    }

    window.addEventListener('scroll', checkPosition);
    checkPosition();
});
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(() => {
            document.getElementById('preloader').style.display = 'none';
            document.getElementById('content').style.display = 'block';
        }, 300);

        const elements = document.querySelectorAll('.fade-in-up');

        function checkPosition() {
            elements.forEach(element => {
                const position = element.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;

                if (position < windowHeight - 50) {
                    element.classList.add('show');
                }
            });
        }

        window.addEventListener('scroll', checkPosition);
        checkPosition();
    });
</script>
@endsection
