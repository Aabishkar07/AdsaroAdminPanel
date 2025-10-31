@extends('frontend.layouts.app')

@section('body')

<section id="portfolio" class="portfolio section">

    <div class="container section-title pt-5 mt-5" data-aos="fade-up">
        <h2 class="fw-bold text-center display-5 ">{{ $store->title }}</h2>
        <p class="text-muted text-center lead">Select Your Ideal Website Layout & Theme</p>
    </div>

    <div class="container">
        @if(session('popsuccess'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('popsuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
            <div class="row gy-4 isotope-container justify-content-center" data-aos="fade-up" data-aos-delay="200">

                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-web">
                    @foreach ($product as $key=>$products )
                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden bg-light">
                        <img src="{{ asset('uploads/' . $products->image) }}" class="img-fluid" alt="{{ $products->title }}">

                        <div class="card-body text-center p-4">
                            <h5 class="fw-bold text-dark mb-2">{{ $products->title }}</h5>
                            <!-- Buttons Row -->
                            <div class="d-flex justify-content-center gap-3 mt-4">
                                <!-- Enquire Now Button -->
                                <button class="btn btn-outline-dark fw-bold px-4 py-2 shadow-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#enquiryModal" data-product-id="{{ $products->id }}">
                                    Enquire Now
                                </button>
                                <!-- See Demo Button -->
                                <a href="{{ $products->link }}" target="_blank" class="btn px-4 py-2 shadow-sm rounded-pill text-white" style="background-color: #6a68AF">
                                    <i class="bi bi-eye"></i> See Demo
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Enquiry Modal -->
<div class="modal fade" id="enquiryModal" tabindex="-1" aria-labelledby="enquiryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="enquiryModalLabel">Enquire About Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('storeproduct') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" id="productInput">
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Your Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label">Your Number</label>
                        <input type="number" class="form-control" name="number" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Your Message</label>
                        <textarea class="form-control" name="message" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Enquiry</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Capture product ID when the button is clicked
    document.querySelectorAll('[data-bs-target="#enquiryModal"]').forEach(button => {
        button.addEventListener('click', function() {
            let productId = this.getAttribute('data-product-id');
            document.getElementById('productInput').value = productId;
        });
    });
</script>

@endsection
