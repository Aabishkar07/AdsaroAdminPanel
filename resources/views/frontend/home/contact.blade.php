@include('frontend.includes.messages')
<script src="https://www.google.com/recaptcha/enterprise.js?render=6LfihZUrAAAAAL6Slny-3cRTcUDmY8h6JHD_tq9m"></script>
@php
    use App\Models\Setting;
    $setting = Setting::where('id', 1)->first();
@endphp
<section id="contact" class="contact section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p style="color:#6a68AF">Get In Touch With Us</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
            <div class="col-lg-6 ">
                <div class="row gy-4">

                    <div class="col-lg-12">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center"
                            data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-geo-alt"></i>
                            <h3>Address</h3>
                            <p>{{ $setting->address }}</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-md-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center"
                            data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-telephone"></i>
                            <h3>Call Us</h3>
                            <p>{{ $setting->contact_number }}</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-md-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center"
                            data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-envelope"></i>
                            <h3>Email Us</h3>
                            <p>{{ $setting->email }}</p>
                        </div>
                    </div><!-- End Info Item -->

                </div>
            </div>

            <div class="col-lg-6">
                @if (session('popsuccess'))
                    <div class="alert alert-success">
                        {{ session('popsuccess') }}
                    </div>
                @endif
                <form id="submitform" action="{{ route('contact.store') }}" method="post" class=""
                    data-aos="fade-up" data-aos-delay="500">
                    @csrf
                    <div class="row gy-4">

                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Your Name"
                                required="">
                            @error('name')
                                <div class="text-danger small">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6 ">
                            <input type="email" class="form-control" name="email" placeholder="Your Email"
                                required="">
                            @error('email')
                                <div class="text-danger small">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-12 ">
                            <input type="number" class="form-control" name="phone" placeholder="Contact Number"
                                required="">
                            @error('phone')
                                <div class="text-danger small">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <input type="text" class="form-control" name="subject" placeholder="Subject"
                                required="">
                            @error('subject')
                                <div class="text-danger small">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <textarea class="form-control" name="message" rows="4" placeholder="Message" required=""></textarea>
                            @error('message')
                                <div class="text-danger small">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="hidden" name="g-token" id="g-token" value="" />

                        <div class="col-md-12 text-center">

                            <button class="btn btn-lg text-white" style="background-color: #6a68AF" type="button"
                                onclick="onClick()">Send
                                Message</button>
                        </div>

                    </div>
                </form>
            </div><!-- End Contact Form -->

        </div>

    </div>
    <script>
        function onClick(e) {

            grecaptcha.enterprise.ready(async () => {
                const token = await grecaptcha.enterprise.execute('6LfihZUrAAAAAL6Slny-3cRTcUDmY8h6JHD_tq9m', {
                    action: 'LOGIN'
                });

                console.log("token", token)

                document.getElementById("g-token").value = token;
                document.getElementById("submitform").submit();
            });
        }
    </script>
</section><!-- /Contact Section -->
