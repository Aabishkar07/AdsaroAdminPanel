@php
    use App\Models\Page;

    $pages = Page::where('id', 8)->first();
@endphp


<section id="services" class="services section">

    <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p style="color:#6a68AF">Featured Services<br></p>

    </div>
    <div class="container section-description" data-aos="fade-up">

        {!! $pages->description !!}
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-5">

            @foreach ($services as $service)
                <!-- Web Development Service -->
                <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <a class="text-decoration-none" href="{{ route('servicesingle', $service->slug) }}">
                        <div class="service-item">
                            <div class="img">
                                <img src="{{ asset('uploads/' . $service->image) }}" class="img-fluid"
                                    alt="{{ $service->title }}">
                            </div>
                            <div class="details position-relative">
                                <div class="icon text-white p-3">
                                    <img src="{{ asset('uploads/' . $service->icon) }}" class="img-fluid"
                                        alt="{{ $service->title }}">
                                </div>
                                <p class="stretched-link">
                                <h3>{{ $service->title }}</h3>
                                </p>
                                <p class="fs-6">{{ $service->description }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach



        </div>

    </div>

</section>
