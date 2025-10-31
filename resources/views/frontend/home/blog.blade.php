@php
    use App\Models\Page;

    $pages = Page::where('id', 11)->first();
@endphp
<section class="">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row justify-content-center">
         <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Adsaro Blog:</h2>
          <p style="color:#6a68AF">Our Thoughts & Stories</p>

        </div><!-- End Section Title -->

          <div class="container section-description" data-aos="fade-up">

        {!! $pages->description !!}
    </div>

    <div class="row mt-5 " data-aos="fade-up" data-aos-delay="100">
      @foreach ($blogs as $key => $blog)
      <div class="col-md-6 col-lg-4 mb-5">
        <a href="{{ route('single', $blog->slug) }}" class="text-decoration-none text-dark">
          <div class="card h-100 border-0 shadow-lg rounded-4 overflow-hidden blog-card-hover" >
            <div class="ratio ratio-16x9" style="min-height: 300px;">
              <img src="{{ asset('/uploads/' . $blog->featured_image) }}" class="card-img-top object-contain" alt="{{ $blog->title }}">
            </div>
            <div class="card-body p-4">
              <div class="d-flex justify-content-between align-items-center mb-3 text-muted small">
                <span>📅 {{ $blog->updated_at->format('jS M Y') }}</span>
                @if ($blog->views)
                <span class="d-flex align-items-center gap-1">
                  👁️ {{ $blog->views }}
                </span>
                @endif
              </div>
              <h5 class="card-title fw-semibold mb-3 fs-5">{{ $blog->title }}</h5>
              <p class="card-text text-secondary fs-6">
                {!! Str::limit(strip_tags($blog->description), 120) !!}
              </p>
            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>

    <div class="text-center mt-4" data-aos="fade-up" data-aos-delay="100">
      <a href="{{ route('blog') }}" style="background-color: #6a68AF" class="btn text-white px-5 py-2 rounded-pill shadow-sm fs-5">
        View All
      </a>
    </div>
  </div>
</section>
