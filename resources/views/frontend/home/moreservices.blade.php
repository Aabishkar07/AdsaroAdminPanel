   <!-- Services 2 Section -->
@php
    use App\Models\Page;

    $pages = Page::where('id', 13)->first();
@endphp
   <section id="services-2" class="services-2 section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Why</h2>
      <p style="color:#6a68AF">Why Choose Us?</p>
    </div><!-- End Section Title -->

          <div class="container section-description" data-aos="fade-up">

        {!! $pages->description !!}
    </div>

    <div class="container">

      <div class="row gy-4">

        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="service-item d-flex position-relative h-100">
            <i class="bi bi-person-circle icon flex-shrink-0"></i>
            <div>
                <h4 class="title">Experienced Team</h4>
                <p class="description fs-6">Our team of experts brings years of experience and in-depth knowledge to every project we handle.</p>
            </div>
          </div>
        </div><!-- End Service Item -->

        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="service-item d-flex position-relative h-100">
            <i class="bi bi-gear icon flex-shrink-0"></i>
            <div>
                <h4 class="title">Tailored Solutions</h4>
                <p class="description fs-6">We customize solutions to meet your specific business needs, ensuring optimal outcomes.</p>
            </div>
          </div>
        </div><!-- End Service Item -->

        <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="service-item d-flex position-relative h-100">
            <i class="bi bi-laptop icon flex-shrink-0"></i>
            <div>
                <h4 class="title">Cutting-Edge Technologies</h4>
                <p class="description fs-6">We leverage the latest tools and technologies to provide innovative solutions that drive success.</p>
            </div>
          </div>
        </div><!-- End Service Item -->

        <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
          <div class="service-item d-flex position-relative h-100">
            <i class="bi bi-bar-chart-line icon flex-shrink-0"></i>
            <div>
                <h4 class="title">Proven Track Record</h4>
                <p class="description fs-6">Our portfolio of successful projects showcases our ability to deliver results that exceed expectations.</p>
            </div>
          </div>
        </div><!-- End Service Item -->

        <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
          <div class="service-item d-flex position-relative h-100">
            <i class="bi bi-people icon flex-shrink-0"></i>
            <div>
                <h4 class="title">Collaborative Approach</h4>
                <p class="description fs-6">We believe in working closely with clients, ensuring transparent communication and collaborative decision-making.</p>
            </div>
          </div>
        </div><!-- End Service Item -->

        <div class="col-md-6" data-aos="fade-up" data-aos-delay="600">
          <div class="service-item d-flex position-relative h-100">
            <i class="bi bi-life-preserver icon flex-shrink-0"></i>
            <div>
                <h4 class="title">Ongoing Support</h4>
                <p class="description fs-6">We provide post-deployment support to ensure your business continues to thrive long after project completion.</p>
            </div>
          </div>
        </div><!-- End Service Item -->

      </div>

    </div>

  </section><!-- /Services 2 Section -->
