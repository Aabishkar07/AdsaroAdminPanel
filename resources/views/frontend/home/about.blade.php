<!-- About Section -->

@php
    use App\Models\Page;
    $aboutus = Page::where('id', 1)->first();

@endphp


@if ($aboutus->third_description)
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">

                <!-- Text Section -->
                <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-right">
                    <div class="pe-lg-5">
                        <p class="fs-5 text-muted mb-0 lh-lg">
                            {!! $aboutus->third_description !!}
                        </p>
                    </div>
                </div>

                <!-- Image Section -->
                <div class="col-lg-6 order-1 order-lg-2 mb-4 mb-lg-0" data-aos="fade-left">
                    <div class="text-center">
                        <img src="{{ asset('uploads/' . $aboutus->third_image) }}" class="img-fluid "
                            style="max-height: 600px; object-fit: contain;" alt="About Nepbyte">
                    </div>
                </div>

            </div>
        </div>
    </section>
@endif



<section id="about" class="about section">

    <div class="container">
        <div class="row ">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <h3 style="color:#6a68AF" class="">About Us – Build Trust & Credibility</h3>
                <img src="{{ asset('uploads/' . $aboutus->main_image) }}" class="img-fluid rounded-4 mb-4"
                    alt="">
                <p class="fs-6">
                    {!! $aboutus->description !!}
                </p>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
                <div class="content ps-0 ps-lg-5">
                    <p class=" fs-6 text-b">
                        {!! $aboutus->secondary_description !!}

                    </p>



                    <div class="position-relative mt-4">
                        <img src="{{ asset('uploads/' . $aboutus->secondary_image) }}" class="img-fluid rounded-4"
                            alt="">
                    </div>
                </div>
            </div>
        </div>

    </div>

</section><!-- /About Section -->


<section class="bg-white">
    <div class="container">
        <div class="rounded-4 border p-5 shadow-sm position-relative bg-white">

            <!-- Badge -->
            <div class="mb-3">
                <span style="background: #6a68AF" class="badge rounded-pill px-3 py-2  text-white fw-semibold">
                    ● IT consulting company
                </span>
            </div>


            <p class="fs-5 text-muted">
                {!! $aboutus->fourth_description !!}
            </p>


            <div class="d-flex flex-wrap justify-content-between align-items-center">

                <a href="#" class="btn btn-lg text-white fw-semibold px-4 py-2" style="background: #6a68af;">
                    Get In Touch With Us →
                </a>


            </div>

        </div>
    </div>
</section>
<style>
    .text-gradient {
        background: linear-gradient(to right, #f43f5e, #10b981);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>
