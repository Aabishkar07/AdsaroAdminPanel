@if ($testimonials && $testimonials->count() > 0)
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<style>
    .testimonial-section {
        padding: 60px 0;
        background-color: #f8f9fa;
    }

    .testimonial-title {
        font-weight: 700;
        color: #6a68af;
        font-size: 2rem;
    }

    .testimonial-subtitle {
        font-size: 1rem;
        color: #6c757d;
        max-width: 600px;
        margin: auto;
    }

    .testimonial-card {
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease;
        height: 100%;
    }

    .testimonial-card:hover {
        transform: translateY(-5px);
    }

    .testimonial-content {
        font-style: italic;
        font-size: 0.95rem;
        color: #495057;
    }

    .testimonial-author {
        display: flex;
        align-items: center;
        margin-top: 20px;
    }

    .testimonial-author img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 15px;
    }

    .testimonial-name {
        font-weight: 600;
        margin: 0;
        font-size: 1rem;
    }

    .testimonial-role {
        font-size: 0.85rem;
        color: #6c757d;
    }

    .star-rating i {
        color: #fbbf24;
        font-size: 0.85rem;
        margin-right: 2px;
    }

    .carousel-indicators [data-bs-target] {
        background-color: #6c757d;
        width: 10px;
        height: 10px;
        border-radius: 50%;
    }

    .carousel-indicators .active {
        background-color: #007bff;
    }

    @media (max-width: 576px) {
        .testimonial-card {
            padding: 16px;
        }

        .testimonial-title {
            font-size: 1.5rem;
        }

        .testimonial-content {
            font-size: 0.9rem;
        }
    }
</style>

<section class="testimonial-section">
    <div class="container text-center mb-5">
        <h2 class="testimonial-title">What Our Clients Say</h2>
        <p class="testimonial-subtitle">Trusted by businesses to deliver impactful digital results</p>
    </div>

    <div class="container">
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($testimonials->chunk(2) as $index => $testimonialChunk)
                    <div class="carousel-item @if($index == 0) active @endif">
                        <div class="row g-4">
                            @foreach ($testimonialChunk as $testimonial)
                                <div class="col-md-6">
                                    <div class="testimonial-card h-100">
                                        <div class="testimonial-content">
                                            {{ Str::limit($testimonial->description, 200) }}
                                        </div>
                                        <div class="testimonial-author mt-3">
                                            {{-- <img src="{{ asset('uploads/' . $testimonial->image) }}"
                                                 onerror="this.src='{{ asset('img/defaultimage.jpg') }}'"
                                                 alt="{{ $testimonial->name }}"> --}}
                                            <div>
                                                <p class="testimonial-name">{{ $testimonial->name }}</p>
                                                {{-- <p class="testimonial-role">{{ $testimonial->designation }}</p> --}}
                                                <div class="star-rating">
                                                    @for ($i = 0; $i < 5; $i++)
                                                        <i class="fas fa-star"></i>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($testimonials->count() > 2)
                <button class="carousel-control-prev"  type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon text-dark"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>

                <div class="carousel-indicators mt-4">
                    @foreach ($testimonials->chunk(2) as $i => $chunk)
                        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}" aria-label="Slide {{ $i + 1 }}"></button>
                    @endforeach
                </div>
            @endif



        </div>
    </div>
</section>
@endif

<style>
.carousel-control-prev-icon,
.carousel-control-next-icon {
    filter: brightness(0) invert(0);
}
.carousel-control-prev,
.carousel-control-next {
    width: 5%;
    top: 50%;
    transform: translateY(-50%);
    z-index: 2;
}

.carousel-control-prev {
    left: -50px; /* push to far left */
}

.carousel-control-next {
    right: -50px; /* push to far right */
}

/* Optional: Adjust icon size and color for visibility */
.carousel-control-prev-icon,
.carousel-control-next-icon {
    width: 30px;
    height: 30px;
    background-size: 100% 100%;
    filter: brightness(0) invert(0);
}
.carousel-indicators {
  position: absolute;
  bottom: -40px;
  left: 50%;
  transform: translateX(-50%);
  width: auto;
  margin: 0;
  padding: 0;
  display: flex;
  gap: 8px;
  justify-content: center;
  z-index: 3;
}

.carousel-indicators button {
  width: 12px;
  height: 12px;
  border-radius: 50%;
  background-color: #6c757d;
  border: none;
  opacity: 0.7;
  transition: opacity 0.3s;
}


.carousel-indicators .active {
  background-color: #007bff;
  opacity: 1;
}

/* Responsive handling */
@media (max-width: 768px) {
    .carousel-control-prev {
        left: -20px;
    }

    .carousel-control-next {
        right: -20px;
    }
}

</style>
