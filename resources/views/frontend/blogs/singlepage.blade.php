@extends('frontend.layouts.app')
@section('body')
<head>
    <meta keyword=""/>
</head>
    <main class=" bg-white">
        <div class="container py-5">
            <section class="ezy__blogdetails2 light" id="ezy__blogdetails2">
                <div class="container ">
                    <div class="row">
                        <div class="col-12 col-md-8">
                            <h1 class="ezy__blogdetails2-heading">{{ $blog->title }} </h1>
                            <div class="py-3 ">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class=" mb-0">
                                        📅 Published: {{ $blog->created_at->format('jS M Y') }}
                                    </div>
                                    @if ($blog->views)
                                        <div class="d-flex align-items-center gap-1 text-muted me-3 mb-0">
                                            👁️ {{ $blog->views }}
                                        </div>
                                    @endif
                                </div>


                            </div>

                            <img src="{{ asset('/uploads/' . $blog->featured_image) }}" alt="{{ $blog->img_alt }}"
                                class="img-fluid rounded" />

                            <div class="ezy__blogdetails2-content mt-5">
                                <p>
                                    {!! $blog->description !!}
                                </p>

                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="card ezy__blogdetails2-posts border-0">
                                <div class="card-header py-1.5 border-0">
                                    <h5 class="mb-0 text-white">Related Blogs</h5>
                                </div>
                                <div class="card-body py-4">


                                    <!-- blog item -->
                                    @foreach ($allblogs as $key => $blog)
                                        <a href="{{ route('single', $blog->slug) }}" class="text-decoration-none text-dark">
                                            <div class="ezy__blogdetails2-item  d-flex gap-x-3 align-items-start">
                                                <img src="{{ asset('/uploads/' . $blog->featured_image) }}"
                                                    alt="{{ $blog->img_alt }}" class="img-fluid rounded  "
                                                    style="width: 120px;heignt:120px" />
                                                <div class="ms-3">
                                                    <div>{{ $blog->title }}</div>
                                                    <div class="d-flex flex-wrap opacity-50">
                                                        <span class="me-3">📅
                                                            {{ $blog->updated_at->format('jS M Y') }}</span>
                                                        @if ($blog->views)
                                                            <span class="d-flex align-items-center gap-1">
                                                                👁️ {{ $blog->views }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <hr class="my-4" />
                                    @endforeach


                                </div>
                            </div>
                            <div class=" w-full pt-3">
                                <img src="{{ asset('images/advertising-journey.gif') }}" alt="Adsaro" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <style>
                .ezy__blogdetails2 {
                    /* Bootstrap variables */
                    --bs-body-bg: rgb(255, 255, 255);

                    /* Easy Frontend variables */
                    --ezy-theme-color: rgb(13, 110, 253);
                    --ezy-theme-color-rgb: 13, 110, 253;
                    --ezy-blog-top-color: #2f2f69;
                    --ezy-card-shadow: 0 10px 75px rgba(186, 204, 220, 0.33);

                    background-color: var(--bs-body-bg);
                    color: var(--bs-body-color);
                    overflow: hidden;
                    padding: 60px 0;
                    position: relative;
                }

                @media (min-width: 768px) {
                    .ezy__blogdetails2 {
                        padding: 100px 0;
                    }
                }

                /* Gray Block Style */
                .gray .ezy__blogdetails2,
                .ezy__blogdetails2.gray {
                    /* Bootstrap variables */
                    --bs-body-bg: rgb(246, 246, 246);
                }

                /* Dark Gray Block Style */
                .dark-gray .ezy__blogdetails2,
                .ezy__blogdetails2.dark-gray {
                    /* Bootstrap variables */
                    --bs-body-color: #ffffff;
                    --bs-body-bg: rgb(9, 91, 222);

                    /* Easy Frontend variables */
                    --ezy-blog-top-color: rgb(4, 51, 113);
                    --ezy-card-shadow: 0 10px 75px rgba(219, 5, 5, 0.33);
                }



                .ezy__blogdetails2-heading {
                    font-weight: 700;
                    font-size: 25px;
                    line-height: 1;
                }

                @media (min-width: 768px) {
                    .ezy__blogdetails2-heading {
                        font-size: 45px;
                    }
                }

                .ezy__blogdetails2-sub-heading {
                    font-size: 18px;
                    line-height: 25px;
                    opacity: 0.8;
                }

                .ezy__blogdetails2-social a {
                    color: var(--bs-body-color);
                    font-size: 22px;
                }

                /* sidebar */
                .ezy__blogdetails2-posts {
                    overflow: hidden;
                    box-shadow: var(--ezy-card-shadow);
                    background-color: var(--bs-body-bg);
                }

                .ezy__blogdetails2-posts .card-header {
                    background-color: var(--ezy-blog-top-color);
                    color: #fff;
                }

                .ezy__blogdetails2 hr {
                    color: rgba(var(--ezy-theme-color-rgb), 0.6);
                }

                /* Content style */
                .ezy__blogdetails2-content,
                .ezy__blogdetails2-content p {
                    color: var(--bs-body-color);
                    font-size: 17px;
                    line-height: 25px;
                    opacity: 0.8;
                }
            </style>
        </div>
    </main>
@endsection
