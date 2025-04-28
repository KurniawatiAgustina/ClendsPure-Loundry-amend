<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/Layouts/footer.css') }}">
    <title>Contoh Footer</title>
</head>

<body>
    <footer class="footer">
        <div class="footer-container">
          <div class="footer-section logo-section">
            <h2>Shoe <span>Care</span></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <div class="social-icons">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
          </div>
          <div class="footer-section contact-section">
            <h3>Get In Touch</h3>
            <p><i class="fas fa-map-marker-alt"></i> 918 Abner Road, Hudson</p>
            <p><i class="fas fa-envelope"></i> example@mail.com</p>
            <p><i class="fas fa-phone-alt"></i> +1 234 567 890</p>
            <p><i class="fas fa-clock"></i> 07:00 AM - 16:00 PM</p>
          </div>
          <div class="footer-section quicklinks-section">
            <h3>Quicklinks</h3>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">FAQs</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div>
          <div class="footer-section gallery-section">
            <h3>Gallery</h3>
            <div class="gallery">
                <img src="{{ asset('assets/LandingPage/image/gsp1.jpg') }}" alt="Deskripsi gambar">
                <img src="{{ asset('assets/LandingPage/image/gsp2.jpg') }}" alt="Deskripsi gambar">
                <img src="{{ asset('assets/LandingPage/image/gsp3.jpg') }}" alt="Deskripsi gambar">
                <img src="{{ asset('assets/LandingPage/image/gsp4.jpg') }}" alt="Deskripsi gambar">
                <img src="{{ asset('assets/LandingPage/image/gsp5.jpg') }}" alt="Deskripsi gambar">
                <img src="{{ asset('assets/LandingPage/image/gsp6.jpg') }}" alt="Deskripsi gambar">
            </div>
          </div>
        </div>
        <div class="footer-bottom">
          <p>Copyright © 2025 Politeknik Negeri Malang</p>
         
        </div>
      </footer>
      

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
