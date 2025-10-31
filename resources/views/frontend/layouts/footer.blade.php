@php
    use App\Models\Setting;
    use App\Models\Service;
    $setting = Setting::where('id', 1)->first();
    $services = Service::get();
@endphp

<footer id="footer" class="footer dark-background py-5">
    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-12 footer-newsletter text-center text-lg-start">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ asset('img/Adsaro white logo.png') }}"
                    style="width: 200px; height: auto; max-height: 80px;" alt="Adsaro Logo">
                <p class="fs-6">Delivering Seamless Digital Experiences With Advanced Technology. Your Trusted IT Company In US Driving Innovation, Growth, And Success. We Build Custom Solutions That Empower Businesses To Thrive In A Fast-Changing Digital World.</p>
            </div>
            <div class="col-lg-3 col-md-3 footer-links">
                <h4>Useful Links</h4>
                <ul class="list-unstyled fs-6">
                    <li><i class="bi bi-chevron-right text-white"></i> <a href="/">Home</a></li>
                    <li><i class="bi bi-chevron-right text-white"></i> <a href="{{ route('aboutus') }}">About us</a>
                    </li>
                    <li><i class="bi bi-chevron-right text-white"></i> <a href="{{ route('services') }}">Services</a>
                    </li>
                    <li><i class="bi bi-chevron-right text-white"></i> <a href="{{ route('blog') }}">Blogs</a>
                    </li>
                    <li><i class="bi bi-chevron-right text-white"></i> <a href="{{ route('termsandcondition') }}">Terms
                            and Condition</a></li>

                    <li><i class="bi bi-chevron-right text-white"></i> <a href="{{ route('privacypolicy') }}">Privacy
                            policy</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 footer-links">
                <h4>Our Services</h4>
                <ul class="list-unstyled fs-6 ">
                    @foreach ($services as $service)
                        <li>
                            <a class="text-decoration-none" href="{{ route('servicesingle', $service->slug) }}">
                                <i class="bi bi-chevron-right text-white "></i>
                                {{ $service->title }}
                            </a>
                        </li>
                    @endforeach

                </ul>
            </div>
            <div class="col-lg-2 col-md-6 footer-about text-center text-lg-start">
                <h4>Contact</h4>
                <div class="footer-contact pt-3">
                    <p class="fs-6 mb-1">{{ $setting->address }}</p>
                    <p class="fs-6 mb-1"><strong>Phone:</strong> <span>{{ $setting->contact_number }}</span></p>
                    <p class="fs-6"><strong>Email:</strong> <span>{{ $setting->email }}</span></p>
                </div>
                <div class="social-links d-flex justify-content-center justify-content-lg-start mt-4">

                    <a href="{{ $setting->facebook }}" target="_blank" class="me-2"><i
                            class="bi bi-facebook"></i></a>
                    <a href="{{ $setting->instagram }}" target="_blank" class="me-2"><i
                            class="bi bi-instagram"></i></a>
                    <a href="{{ $setting->twitter }}" target="_blank" class="me-2"><i
                            class="bi bi-twitter-x"></i></a>
                    <a href="{{ $setting->linkedin }}" target="_blank"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container text-center mt-4">
        <p class="fs-6 mb-0">© 2025 <strong class="px-1 sitename">Adsaro</strong> All Rights Reserved</p>
    </div>
</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"
    style="bottom: 70px; right: 20px; z-index: 1050;">
    <i class="bi bi-arrow-up-short"></i>
</a>
