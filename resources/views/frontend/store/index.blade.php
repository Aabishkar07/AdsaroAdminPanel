@extends('frontend.layouts.app')
@section('body')

<div class="mt-5 pt-5">
    <style>
        .plan-card {
            border-radius: 15px;
            padding: 30px;
            transition: all 0.3s ease-in-out;
            border: 2px solid transparent;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            background: #ffffff;
            text-align: center;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .plan-card:hover {
            transform: translateY(-10px);
            border-color: #6a68AF;
            box-shadow: 0px 15px 30px rgba(0, 123, 255, 0.2);
        }
        .badge-popular {
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            background: #6a68AF;
            color: white;
            padding: 8px 18px;
            font-size: 14px;
            font-weight: bold;
            border-radius: 20px;
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.2);
        }
        .plan-price {
            background: #6a68AF;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 20px;
            display: inline-block;
            margin-top: 10px;
        }
        .plan-card ul {
            list-style: none;
            padding: 0;
            margin: 20px 0;
        }
        .plan-card ul li {
            padding: 8px 0;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .btn-primary {
            background: #6a68AF;
            border: none;
            transition: all 0.3s ease-in-out;
            padding: 12px;
            font-size: 16px;
            border-radius: 10px;
        }
        .btn-primary:hover {
            background: #5a5baF;
            transform: scale(1.05);
        }
        .store-banner {
            width: 100%;
            height: 300px;
            background: url('{{ asset('img/stats-bg.jpg') }}') no-repeat center center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 28px;
            font-weight: bold;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
            text-align: center;
            padding: 0 20px;
           background:black;
        }

        @media (max-width: 768px) {
            .store-banner {
                font-size: 20px;
                height: 250px;
            }
            .plan-card {
                padding: 20px;
            }
            .plan-card ul li {
                font-size: 14px;
            }
            .plan-price {
                font-size: 18px;
            }
            .btn-primary {
                font-size: 14px;
            }
        }
    </style>





<section class="ezy__header16 light" style="background-image: url(https://cdn.easyfrontend.com/pictures/contact/contact13.jpg)">
    <svg class="ezy__header16-shape position-absolute bottom-0 start-0" xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 1920 150" preserveAspectRatio="none">
      <path d="M959 0c320.067 0 640.4 38.333 961 150H0C319.267 38.333 638.933 0 959 0z" fill="currentColor"
        fill-rule="evenodd" />
    </svg>

    <div class="container position-relative" data-aos="fade-up" data-aos-delay="300">
      <div class="row align-items-center justify-content-center">
        <div class="col-lg-12 text-center">
          <h2 class="ezy__header16-heading mb-4">Elevate your brand with Adsaro!</h2>
          <div class="row justify-content-center">
            <div class="col-12 col-lg-9">
              <p class="ezy__header16-sub-heading px-5 text-white">
                Effortlessly create and customize your website—from stunning themes 🎨 to engaging content ✍️. Launch your business online 🚀 in just minutes!              </p>
            </div>
          </div>

          <p class="ezy__header16-registration-note mb-0 mt-4">* No registration required</p>
        </div>
        <div class="col-lg-10 mt-5">
          <div class="ezy__header16-video">
            {{-- <iframe class="video-async" data-source="vimeo" data-video="54298665" data-color="ECCE52" allowfullscreen=""
              src="https://player.vimeo.com/video/54298665?color=ECCE52"></iframe> --}}


              <video src="{{ asset('img/welcome.mp4') }}" controls autoplay muted loop poster="{{ asset('img/thumbnail.jpg') }}">
                Your browser does not support the video tag.
            </video>

            </div>
        </div>
      </div>
    </div>
  </section>

  <style>
  .ezy__header16 {
    /* Bootstrap variables */
    --bs-body-color: #ffffff;
    --bs-body-bg: rgb(255, 255, 255);

    /* Easy Frontend variables */
    --ezy-theme-color: rgb(13, 110, 253);
    --ezy-theme-color-rgb: 13, 110, 253;
    --ezy-shadow: 0px 4px 44px rgba(159, 190, 218, 0.37);
    --ezy-feature-img-shadow: 0px -5px 44px rgba(159, 190, 218, 0.37);

    background-image: var(--bs-body-bg);
    background-position: center;
    background-size: cover;
    background-attachment: fixed;
    overflow: hidden;
    padding-top: 100px;
    position: relative;
  }

  .ezy__header16::before {
    content: "";
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    background-image: linear-gradient(145deg, #9013fe 0%, #101a8e 100%);
    opacity: 0.8;
  }

  @media (min-width: 768px) {
    .ezy__header16 {
      padding-top: 80px;
    }
  }

  /* Gray Block Style */
  .gray .ezy__header16,
  .ezy__header16.gray {
    /* Bootstrap variables */
    --bs-body-bg: rgb(246, 246, 246);
  }

  /* Dark Gray Block Style */
  .dark-gray .ezy__header16,
  .ezy__header16.dark-gray {
    /* Bootstrap variables */
    --bs-body-color: #ffffff;
    --bs-body-bg: rgb(30, 39, 53);
  }

  /* Dark Block Style */
  .dark .ezy__header16,
  .ezy__header16.dark {
    /* Bootstrap variables */
    --bs-body-color: #ffffff;
    --bs-body-bg: rgb(11, 23, 39);
  }

  .ezy__header16-heading {
    font-weight: bold;
    font-size: 25px;
    line-height: 25px;
    color: var(--bs-body-color);
  }

  @media (min-width: 768px) {
    .ezy__header16-heading {
      font-size: 70px;
      line-height: 70px;
    }
  }

  .ezy__header16-sub-heading {
    color: var(--bs-body-color);
    font-size: 22px;
    line-height: 1.5;
    opacity: 0.8;
  }

  .ezy__header16-registration-note {
    color: var(--bs-body-color);
  }

  .ezy__header16-btn {
    box-shadow: var(--ezy-shadow);
    border: none;
    padding: 0;
  }

  /* .ezy__header16-video {
    position: relative;
    padding-top: 56.25%;
    height: 0;
    background-color: #fff;
    border-radius: 20px;
    overflow: hidden;
  }

  .ezy__header16-video iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    max-width: 100%;
    border: none;
  } */

  .ezy__header16-video {
    position: relative;
    width: 100%;
    max-width: 800px; /* Adjust as needed */
    margin: auto;
    background-color: #fff;
    border-radius: 20px;
    overflow: hidden;
}

.ezy__header16-video video {
    width: 100%;
    height: auto;
    display: block;
    border-radius: 20px;
}


  .ezy__header16-shape {
    color: var(--bs-body-bg);
  }
  </style>






<section class="ezy__featured14 light">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2 class="ezy__featured14-heading mb-3">Get a Website in Just 3 Easy Steps</h2>
                <p class="ezy__featured14-sub-heading">
                    Our simple and streamlined process ensures you can create, customize, and launch your site effortlessly—no experience needed! Start today and bring your online presence to life.
                </p>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-6 col-lg-4">
                <div class="ezy__featured14-item">
                    <div class="ezy__featured14-icon">1</div>
                    <h4 class="ezy__featured14-title">Select a Package</h4>
                    <p class="ezy__featured14-content">Choose the package that best fits your needs and budget.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="ezy__featured14-item">
                    <div class="ezy__featured14-icon">2</div>
                    <h4 class="ezy__featured14-title">Select a Theme</h4>
                    <p class="ezy__featured14-content">Pick a theme that matches your business style and vision.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="ezy__featured14-item">
                    <div class="ezy__featured14-icon">3</div>
                    <h4 class="ezy__featured14-title">Enquire & Launch</h4>
                    <p class="ezy__featured14-content">Submit your inquiry, and we’ll handle everything from setup to launch</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.ezy__featured14 {
    background: #f9f9f9;
    padding: 80px 0;
}

.ezy__featured14-heading {
    font-weight: 700;
    font-size: 40px;
    color: #333;
}

.ezy__featured14-sub-heading {
    font-size: 18px;
    color: #555;
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.6;
}

.ezy__featured14-item {
    text-align: center;
    background: #fff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease-in-out;
}

.ezy__featured14-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
}

.ezy__featured14-icon {
    width: 60px;
    height: 60px;
    background: #007bff;
    color: #fff;
    font-size: 24px;
    font-weight: bold;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
}

.ezy__featured14-title {
    font-size: 22px;
    font-weight: 600;
    color: #222;
}

.ezy__featured14-content {
    font-size: 16px;
    color: #666;
    line-height: 1.5;
}
</style>



    {{-- <div class="store-banner">Adsaro Store - Elevate Your Digital Experience</div> --}}

    <div class=" d-flex align-items-center justify-content-center py-5">
        <div class="container">
            <h2 class="fw-bold text-center">Find the Perfect Website Theme for Your Business</h2>
            <p class="text-muted text-center">At Adsaro Store, we offer a range of fully coded websites designed to meet your business needs. Whether you need a ready-made solution or a custom website built from scratch, we have the perfect package for you:</p>

            <div class="row justify-content-center g-4 mt-5">
                @foreach ($stores as $store)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="plan-card position-relative">
                        <span class="badge-popular">Best Seller</span>
                        <h5 class="fw-bold pt-4">{{ $store->title }}</h5>
                        <span class="plan-price">Rs {{ $store->price }}</span>
                        <ul class="mt-4 fw-bold">
                            @foreach(json_decode($store->service) as $feature)
                            <li>{{ $feature }}</li>
                            @endforeach
                        </ul>
                        <a href="{{ route('storesingle' , $store->slug) }}">
                            <button class="btn btn-primary w-100 mt-3">View More</button>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
