@props(['banners'])
<div class="container-fluid hero-header banner-container">
  <div class="container py-5">
    <div class="row g-5 align-items-center">
      <div class="">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
          <div class="carousel-inner">
            @foreach($banners as $key => $banner)
              <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                <img src="{{ asset($banner->image) }}" class="img-fluid w-100 rounded carousel-image" alt="Banner {{ $key + 1 }}">
                @if($banner->link)
                  <div class="carousel-caption">
                    <a href="{{ $banner->link }}" class="btn btn-warning px-4 py-2 rounded">Xem thêm</a>
                  </div>
                @endif
              </div>
            @endforeach
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<style scoped>
.hero-header {
  background-color: aquamarine;
  padding: 0;
  width: 100%;
  border-radius: 0;

}

.carousel-inner {
  border-radius: 10px;
  overflow: hidden; /* Đảm bảo ảnh không tràn ra ngoài */
}



.carousel-control-prev-icon, .carousel-control-next-icon {
  background-color: rgba(0, 0, 0, 0.3);
  border-radius: 50%;
}
</style>