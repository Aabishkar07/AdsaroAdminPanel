@extends('frontend.layouts.app')
@section('body')
    <section class="ezy__featured44 light">
        <div class="container">
            <div class="row">
                <!--  heading-->
                <div class="col-12 col-md-9">
                    <div class="mb-5">
                        <h1 class="ezy__featured44-heading mb-3">{{ $service->title }}</h1>
                        <p class="ezy__featured44-sub-heading">
                            {{ $service->description }}
                        </p>
                    </div>
                </div>
                <!-- img -->
                <div class="col-12 col-lg-6 text-center">
                    <img style="object-fit: cover; width: 100%; height: 100%;" src="{{ asset('uploads/' . $service->image) }}"
                        alt="{{ $service->img_alt }}" class="img-fluid ezy__featured44-bg-holder">
                </div>


                <!-- cards -->
                <div class="col-12 col-lg-6 ">
                    {!! $service->long_description !!}
                </div>
            </div>
        </div>



        <div class="container services section px-2">
            <div class=" py-3 ">
                <div style="font-size: 30px;" class="text-[#6868af] fw-bold mb-0">Other Services</div>
            </div>

            <div class="row ">
                @foreach ($services as $service)
                    <!-- Web Development Service -->
                    <div class="col-xl-4 col-md-6 mt-3">
                        <a class="text-decoration-none" href="{{ route('servicesingle', $service->slug) }}">
                            <div class="service-item">
                                <div class="img">
                                    <img src="{{ asset('uploads/' . $service->image) }}" class="img-fluid"
                                        alt="{{ $service->img_alt }}">
                                </div>
                                <div class="details position-relative">
                                    <div class="icon text-white p-3">
                                        <img src="{{ asset('uploads/' . $service->icon) }}" class="img-fluid"
                                            alt="icon">
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

    <style>
        .ezy__featured44 {
            --bs-body-color: rgb(50, 62, 80);
            --bs-body-bg: rgb(255, 255, 255);

            /* Easy Frontend variables */
            --ezy-theme-color: rgb(13, 110, 253);
            --ezy-theme-color-rgb: 13, 110, 253;
            --ezy-card-bg: transparent;

            background-color: var(--bs-body-bg);
            padding: 60px 0;
        }

        @media (min-width: 768px) {
            .ezy__featured44 {
                padding: 100px 0;
            }
        }

        /* Gray Block Style */
        .gray .ezy__featured44,
        .ezy__featured44.gray {
            /* Bootstrap variables */
            --bs-body-bg: rgb(246, 246, 246);
        }

        /* Dark Gray Block Style */
        .dark-gray .ezy__featured44,
        .ezy__featured44.dark-gray {
            /* Bootstrap variables */
            --bs-body-color: #ffffff;
            --bs-body-bg: rgb(30, 39, 53);
        }

        /* Dark Block Style */
        .dark .ezy__featured44,
        .ezy__featured44.dark {
            /* Bootstrap variables */
            --bs-body-color: #ffffff;
            --bs-body-bg: rgb(11, 23, 39);
        }

        .ezy__featured44-heading {
            font-size: 28px;
            font-weight: 700;
            line-height: 1.2;
            color: var(--bs-body-color);
        }

        @media (min-width: 768px) {
            .ezy__featured44-heading {
                font-size: 45px;
            }
        }

        .ezy__featured44-sub-heading {
            font-size: 18px;
            line-height: 30px;
            color: var(--bs-body-color);
            opacity: 0.8;
        }

        /* img */
        .ezy__featured44-bg-holder {
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            border-radius: 20px;
            height: 100%;
            min-height: 400px;
        }

        @media (min-width: 991px) {
            .ezy__featured44-bg-holder {
                height: 550px;
            }
        }

        /* card */
        .ezy__featured44 .card {
            background-color: var(--ezy-card-bg);
            color: var(--bs-body-color);
            border: 0 !important;
        }

        .ezy__featured44-card-title {
            font-size: 20px;
            font-weight: 700;
        }

        .ezy__featured44-card-text {
            font-size: 16px;
            font-weight: 300;
            line-height: 1.3;
        }

        .ezy__featured44-card-icon {
            background-color: var(--ezy-theme-color);
            color: #ffffff;
            min-width: 60px !important;
            height: 50px;
            border-radius: 10px;
            font-size: 18px;
        }
    </style>
@endsection
