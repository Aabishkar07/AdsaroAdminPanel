<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<section id="clients" class="py-5 bg-light">
    <div class="container text-center" data-aos="fade-up">
        <div class="owl-carousel owl-theme">
            @foreach ($clients as $key => $client)
                <div class="item ">
                    <div
                        class="client-logo bg-white shadow-sm border rounded p-1 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('uploads/' . $client->featured_image) }}" class="img-fluid"
                            alt="{{ $client->title }}">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
            items: 6,
            margin: 10,
            dots: false,
            loop: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                768: {
                    items: 3
                },
                992: {
                    items: 4
                },
                1200: {
                    items: 6
                }
            }
        });
    });
</script>

<style>
    .client-logo img {
        max-width: 120px;
        max-height: 120px;
        object-fit: cover;
    }
</style>
