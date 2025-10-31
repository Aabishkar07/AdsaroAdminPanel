
@php
    use App\Models\Page;

    $pages = Page::where('id', 10)->first();
@endphp
<section id="portfolio" class="portfolio section">

    <div class="container section-title pt-5">
        <h2>Portfolio</h2>
        <p>CHECK OUR PORTFOLIO</p>

    </div>
        <div class="container section-description" >

        {!! $pages->description !!}
    </div>

    <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

            <ul class="portfolio-filters isotope-filters" data-aos-delay="100">
                <li data-filter="*" class="filter-active">All</li>
                <li data-filter=".filter-web">Web</li>
                <li data-filter=".filter-graphics">Graphics</li>
                <li data-filter=".filter-app">App</li>
            </ul>

            <div class="row gy-4 isotope-container" data-aos-delay="200">
                @foreach ($portfolios as $portfolio)
                    @php
                        $filterClass = 'filter-' . strtolower($portfolio->category);
                    @endphp
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item {{ $filterClass }}">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('uploads/' . $portfolio->banner_image) }}" class="img-fluid"
                                alt="{{ $portfolio->title }}">
                            <div class="portfolio-info">
                                <h4>{{ $portfolio->title }}</h4>
                                <p>{{ $portfolio->subtitle }}</p>
                                <a href="{{ asset('uploads/portfolio/' . $portfolio->image) }}"
                                    title="{{ $portfolio->title }}"
                                    data-gallery="portfolio-gallery-{{ strtolower($portfolio->category) }}"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                @if ($portfolio->link)
                                    <a href="{{ $portfolio->link }}" target="_blank" title="Visit Project"
                                        class="details-link"><i class="bi bi-link-45deg"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </div>

</section>
