
   <!-- Team Section -->
@php
    use App\Models\Page;

    $pages = Page::where('id', 12)->first();
@endphp
   <section id="team" class="team section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Team</h2>
            <p style="color:#6a68AF">CHECK OUR TEAM</p>
         
        </div><!-- End Section Title -->
       <div class="container section-description" data-aos="fade-up">

        {!! $pages->description !!}
    </div>
        <div class="container">
            {{-- <div class="row gy-5 justify-content-center">
                @foreach ($teams as $key => $team)
                    @if ($key < 3)
                        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="member">
                                <div class="pic">
                                    <img src="{{ asset('uploads/' . $team->image) }}" class="img-fluid grayscale"
                                        alt="{{ $team->name }}">
                                </div>
                                <div class="member-info">
                                    <h4>{{ $team->name }}</h4>
                                    <span class="">{{ $team->designation }}</span>
                                    <div class="social">
                                        @if ($team->website)
                                            <a target="_blank" href="{{ $team->website }}"><i
                                                    class="bi bi-globe text-black"></i></a>
                                        @endif
                                        @if ($team->linkedin)
                                            <a target="_blank" href="{{ $team->linkedin }}"><i
                                                    class="bi bi-linkedin text-black"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div> --}}

            <div class="row gy-5 justify-content-center  mt-2">
                <!-- Centered Bottom Three Members -->
                {{-- Top 2 --}}
                <div class="row  justify-content-center">
                    @foreach ($teams as $key => $team)
                        @if ($key < 3)
                            <div class="col-lg-3 col-md-6 mt-3" data-aos="fade-up" data-aos-delay="100">
                                @include('frontend.team.team-card', ['team' => $team])
                            </div>
                        @endif
                    @endforeach
                </div>

                {{-- Middle 3 --}}
                <div class="row justify-content-center mt-4">
                    @foreach ($teams as $key => $team)
                        @if ($key >= 3 && $key < 6)
                            <div class="col-lg-3 col-md-6 mt-3" data-aos="fade-up" data-aos-delay="150">
                                @include('frontend.team.team-card', ['team' => $team])
                            </div>
                        @endif
                    @endforeach
                </div>

                {{-- Bottom (rest) --}}
                <div class="row justify-content-center mt-4">
                    @foreach ($teams as $key => $team)
                        @if ($key >= 6)
                            <div class="col-lg-3 col-md-6 mt-3" data-aos="fade-up" data-aos-delay="200">
                                @include('frontend.team.team-card', ['team' => $team])
                            </div>
                        @endif
                    @endforeach
                </div>

            </div>

            <style>
                .grayscale {
                    filter: grayscale(100%);
                    transition: 0.3s ease-in-out;
                    cursor: pointer;
                }

                .grayscale:hover {
                    filter: grayscale(0%);
                }
            </style>
        </div>


    </section><!-- /Team Section -->
