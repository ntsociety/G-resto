
{{-- <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('frontend/images/b2.jpg') }}" class="d-block w-100 slider-img" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ asset('frontend/images/b1.jpg') }}" class="d-block w-100 slider-img" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ asset('frontend/images/b3.jpg') }}" class="d-block w-100 slider-img" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
</div> --}}







<!-- header -->
<header id = "header" class = " carousel slide" data-bs-ride = "carousel">
<div class = " d-flex align-items-center carousel-inner">
    <div class = "text-center carousel-item active">
        <img src="{{ asset('frontend/images/b2.jpg') }}" class="d-block w-100 slider-img" alt="...">
    </div>
    <div class = "text-center carousel-item">
        <img src="{{ asset('frontend/images/b3.jpg') }}" class="d-block w-100 slider-img" alt="...">
    </div>

</div>

<button class = "carousel-control-prev" type = "button" data-bs-target="#header" data-bs-slide = "prev">
    <span class = "carousel-control-prev-icon"></span>
</button>
<button class = "carousel-control-next" type = "button" data-bs-target="#header" data-bs-slide = "next">
    <span class = "carousel-control-next-icon"></span>
</button>
</header>
<!-- end of header -->
