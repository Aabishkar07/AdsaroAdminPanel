 <!-- Features Section -->
 @php
    use App\Models\Page;
 $aboutus = Page::where('id', 1)->first();

 $innovative = Page::where('id', 2)->first();
 $approach = Page::where('id', 3)->first();
 $stories = Page::where('id', 4)->first();
 $getintouch = Page::where('id', 5)->first();

@endphp
 <section id="features" class="features section">

     <div class="container">

         <ul class="nav nav-tabs row  d-flex" data-aos="fade-up" data-aos-delay="100">
             <li class="nav-item col-3">
                 <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                     <i class="bi bi-binoculars"></i>
                     <h4 class="d-none d-lg-block text-black">Innovative Solutions</h4>
                 </a>
             </li>
             <li class="nav-item col-3">
                 <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                     <i class="bi bi-box-seam"></i>
                     <h4 class="d-none d-lg-block text-black">Our Approach</h4>
                 </a>
             </li>
             <li class="nav-item col-3">
                 <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                     <i class="bi bi-brightness-high"></i>
                     <h4 class="d-none d-lg-block text-black">Success Stories</h4>
                 </a>
             </li>
             <li class="nav-item col-3">
                 <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-4">
                     <i class="bi bi-command"></i>
                     <h4 class="d-none d-lg-block text-black">Get In Touch</h4>
                 </a>
             </li>
         </ul><!-- End Tab Nav -->

         <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

             <div class="tab-pane fade active show" id="features-tab-1">
                 <div class="row">
                     <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                         <h3>{!! $innovative->description !!}</h3>

                     </div>
                     <div class="col-lg-6 order-1 order-lg-2 text-center">
                         <img src="{{ asset('uploads/'. $innovative->main_image) }}" alt="" class="img-fluid">
                     </div>
                 </div>
             </div><!-- End Tab Content Item -->

             <div class="tab-pane fade" id="features-tab-2">
                 <div class="row">
                     <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                         <h3>{!! $approach->description !!}</h3>

                     </div>
                     <div class="col-lg-6 order-1 order-lg-2 text-center">
                         <img src="{{ asset('uploads/'. $approach->main_image) }}" alt="" class="img-fluid">
                     </div>
                 </div>
             </div><!-- End Tab Content Item -->

             <div class="tab-pane fade" id="features-tab-3">
                 <div class="row">
                     <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                         <h3>{!! $stories->description !!}</h3>


                     </div>
                     <div class="col-lg-6 order-1 order-lg-2 text-center">
                         <img src="{{ asset('uploads/'. $stories->main_image) }}" alt="" class="img-fluid">
                     </div>
                 </div>
             </div><!-- End Tab Content Item -->

             <div class="tab-pane fade" id="features-tab-4">
                 <div class="row">
                     <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                         <h3>{!! $getintouch->description !!}</h3>


                     </div>
                     <div class="col-lg-6 order-1 order-lg-2 text-center">
                         <img src="{{ asset('uploads/'. $getintouch->main_image) }}" alt="" class="img-fluid">
                     </div>
                 </div>
             </div><!-- End Tab Content Item -->

         </div>

     </div>

 </section><!-- /Features Section -->
