<div class="min-vh-100 position-relative">
    <!-- Full dark overlay with reduced opacity -->
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.5); z-index: 1;">
    </div>

    <!-- Background image -->
    <img src="{{ asset('uploads/' . $banners->banner_image) }}"
        class="w-100 h-100 object-fit-cover position-absolute top-0 start-0" style="z-index: 0;" alt="Hero Background">

    <!-- Text content -->
    <div class="container position-relative text-center text-white d-flex flex-column justify-content-center align-items-center min-vh-100"
        style="z-index: 2;">
        <h1 class=" fw-bold text-white" data-aos-delay="100" style="font-size: 50px;"> Innovate. Design. Develop. </h1>
        <div class=" fw-bold text-white" data-aos-delay="100" style="font-size: 30px;"> {{ $banners->title }}</div>
        {{-- <p class="lead px-3 px-md-5 fs-2"  data-aos-delay="200">

        </p> --}}
        <div class="mt-4" data-aos-delay="300">
            <a href="{{ route('contact') }}" class="btn btn-lg text-white" style="background-color: #6a68AF"
                data-aos-delay="400">Get In Touch</a>
        </div>
    </div>
</div>
