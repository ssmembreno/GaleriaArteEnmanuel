<!-- CARRUSEL-->
<div id="heroSlider" class="carousel slide hero-carousel carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active">
            <div class="row g-0">
                <div class="col-md-6 left-content slide1">
                    <h1>BUY ART ONLINE</h1>
                    <p>Where to Buy Contemporary Art? ArtMajeur! The Art Gallery with 3,600,000 works for sale by international artists.</p>
                    <a href="#" class="btn btn-purple">Browse artworks</a>
                </div>
                <div class="col-md-6 right-image">
                    <img src="{{ asset('img/Enmanuel1.jpg') }}" alt="Imagen 1">
                </div>
            </div>
        </div>
        <!-- Slide 2 -->
        <div class="carousel-item">
            <div class="row g-0">
                <div class="col-md-6 left-content slide2">
                    <h1>EXHIBITIONS</h1>
                    <p>Discover new exhibitions from local and international artists.</p>
                    <a href="#" class="btn btn-purple">View events</a>
                </div>
                <div class="col-md-6 right-image">
                    <img src="{{ asset('img/Enmanuel2.jpg') }}" alt="Imagen 2">
                </div>
            </div>
        </div>
        <!-- Slide 3 -->
        <div class="carousel-item">
            <div class="row g-0">
                <div class="col-md-6 left-content slide3">
                    <h1>PROMOTE YOUR ART</h1>
                    <p>Join the platform and showcase your talent to the world.</p>
                    <a href="#" class="btn btn-purple">Start now</a>
                </div>
                <div class="col-md-6 right-image">
                    <img src="{{ asset('img/Enmanuel3.jpg') }}" alt="Imagen 3">
                </div>
            </div>
        </div>
    </div>
    <!--Indicators
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
    -->
    <!-- Buttons carousel -->
    <button class="carousel-control-prev" type="button" data-bs-target="#heroSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
