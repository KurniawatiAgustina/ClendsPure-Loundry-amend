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
                <h6 style="text-align: start">PT. RAPID PLAST 1 Jl. Berbek Industri V No.10, Bebek, Berbek, Kec. Waru, Kabupaten Sidoarjo, Jawa Timur.</h6>
                <p class="phone-number" style="text-align: start; padding-top: 15px;"><i class="bi bi-telephone-fill" style="margin-right: 10px;"></i>(031)8436669</p>
            </div>
        </div>
          <div id="plant2" class="box-plant card" style="border-radius: 0; height: 200px;" onclick="changeMap(2)">
              <div class="card-body">
                  <h6 style="text-align: start">PT. RAPID PLAST 2 Jl. Berbek Industri V No.21, Bebek, Berbek, Kec. Waru, Kabupaten Sidoarjo, Jawa Timur </h6>
                  <p class="phone-number" style="text-align: start; padding-top: 15px;"><i class="bi bi-telephone-fill" style="margin-right: 10px;"></i>(031)8436669</p>
              </div>
          </div>
          <div id="plant3" class="box-plant card" style="border-radius: 0; height: 200px;" onclick="changeMap(3)">
              <div class="card-body">
                  <h6 style="text-align: start">PT. RAPID PLAST 3 Jl. Darma Kusuma, Wangunharja, Kec. Cikarang Utara, Kabupaten Bekasi, Jawa Barat</h6>
                  <p class="phone-number" style="text-align: start; padding-top: 15px;"><i class="bi bi-telephone-fill" style="margin-right: 10px;"></i>(031)8436669</p>
              </div>
          </div>
          <div id="plant4" class="box-plant card" style="border-radius: 0; height: 200px;" onclick="changeMap(4)">
              <div class="card-body">
                  <h6 style="text-align: start">PT. RAPID PLAST 4 No, Jl. Raya Surabaya - Malang No.54, Palang, Lemahbang, Sukorejo, Pasuruan Regency, East Java</h6>
                  <p class="phone-number" style="text-align: start; padding-top: 15px;"><i class="bi bi-telephone-fill" style="margin-right: 10px;"></i>(031)8436669</p>
              </div>
          </div>
          <div id="plant5" class="box-plant card" style="border-radius: 0; height: 200px;" onclick="changeMap(5)">
              <div class="card-body">
                  <h6 style="text-align: start">PT. RAPID PLAST 5 Jl. Kranji No.2b Blok F5, Cicau, Central Cikarang, Bekasi Regency, West Java </h6>
                  <p class="phone-number" style="text-align: start; padding-top: 15px;"><i class="bi bi-telephone-fill" style="margin-right: 10px;"></i>(031)8436669</p>
              </div>
          </div>
          <div id="plant6" class="box-plant card" style="border-radius: 0; height: 200px;" onclick="changeMap(6)">
              <div class="card-body">
                  <h6 style="text-align: start">PT. RAPID PLAST 6 Jl. Berbek Industri V No.10, Bebek, Berbek, Kec. Waru, Kabupaten Sidoarjo, Jawa Timur</h6>
                  <p class="phone-number" style="text-align: start; padding-top: 15px;"><i class="bi bi-telephone-fill" style="margin-right: 10px;"></i>(031)8436669</p>
              </div>
          </div>
      </div>
  </div>
</div>

<div class="more-info">
    <div class="d-flex justify-content-center flex-wrap text-center gap-3">
        <!-- Card 1 -->
        <div class="card fade-in-up shadow" style="width: 18rem; border-radius: 10px;">
            <div class="card-body-3">
                <i class="bi bi-megaphone-fill custom-icon fade-in-up"></i>
                <p class="card-end-text fade-in-up">
                    <strong>"SPEAK UP" MOVEMENT</strong><br>
                    Share your opinions and ideas that you feel will support our company's growth as well as report information deemed as unethical or poses as a violation to Rapid Plast working environment.<br><br>
                    Email: <a href="mailto:speak.up@dynapackasia.com">info@rapid.co.id</a><br>
                    Call: <a href="tel:+628159797971"><strong>+62 815 9797971</strong></a>
                </p>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="card fade-in-up shadow" style="width: 18rem; border-radius: 10px;">
            <div class="card-body-3">
                <i class="bi bi-person-circle custom-icon fade-in-up"></i>
                <p class="card-end-text fade-in-up">
                    <strong>Sales:</strong><br>
                    Email: <a href="mailto:nbd@dynapackasia.com">info@rapid.co.id</a><br><br>
                    <strong>Call Center Sales</strong><br>
                    <strong>Consumer Packaging:</strong><br>
                    <a href="tel:+6287876751548">+62 878 76751548</a><br>
                    <a href="tel:+6281901407160">+62 819 01407160</a><br><br>

                </p>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="card fade-in-up shadow" style="width: 18rem; border-radius: 10px;">
            <div class="card-body-3">
                <i class="bi bi-bag-dash-fill custom-icon fade-in-up"></i>
                <p class="card-end-text fade-in-up">
                    <strong>Career:</strong><br>
                    <a href="mailto:recruitment@dynapackasia.com">recruitment@rapidplast.com</a>
                </p>
            </div>
        </div>
    </div>



    <div class="end-text fade-in-up p-5" style="color: rgb(255, 255, 255);">
        <p class="paragraph" style="margin-top: 0;">Rapid plast has the expertise, facilities, and technology to meet your specific requirements for plastic packaging.</p>
        <p class="paragraph" style="margin-top: 0;">With our focus on innovation, design, and essential safety aspects, we strive to ensure consumer confidence in your products.</p>
        <p class="paragraph" style="margin-top: 0;">We are committed to serving you so do let us know of your needs and inquiries.</p>
    </div>

</div>



<script>
  function changeMap(id) {
      const mapUrls = {
          1: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.0859780476258!2d112.75439447404227!3d-7.344241872244963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb255b4a33d9%3A0x7e9a4d14b6b79322!2sPT.%20Rapid%20Plast%20Indonesia%20Plant%201!5e0!3m2!1sid!2sid!4v1724058025981!5m2!1sid!2sid',
          2: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.082801903194!2d112.75893277404224!3d-7.344598672248897!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb2a90c1d593%3A0xeca0a15f3daee527!2sPT.%20Rapid%20Plast%20Indonesia%20Plant%202!5e0!3m2!1sid!2sid!4v1724142934306!5m2!1sid!2sid',
          3: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.0859780476258!2d112.75439447404227!3d-7.344241872244963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb255b4a33d9%3A0x7e9a4d14b6b79322!2sPT.%20Rapid%20Plast%20Indonesia%20Plant%203!5e0!3m2!1sid!2sid!4v1724058025981!5m2!1sid!2sid',
          4: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15814.923589939363!2d112.69707181220676!3d-7.711997740643295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7d0d54ea5efe9%3A0x66aacb30b4abe2da!2sPT.%20RAPID%20PLAST%20INDONESIA%20-%20PLANT%204!5e0!3m2!1sid!2sid!4v1724143141484!5m2!1sid!2sid',
          5: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15861.293907974488!2d107.13001171060051!3d-6.352151446707041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699b33dca82477%3A0x225f3d0429bfa5de!2sPT.%20Rapid%20Plast%20Indonesia%20Plant%205!5e0!3m2!1sid!2sid!4v1724143090551!5m2!1sid!2sid',
          6: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.0859780476258!2d112.75439447404227!3d-7.344241872244963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb255b4a33d9%3A0x7e9a4d14b6b79322!2sPT.%20Rapid%20Plast%20Indonesia%20Plant%206!5e0!3m2!1sid!2sid!4v1724058025981!5m2!1sid!2sid'
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
