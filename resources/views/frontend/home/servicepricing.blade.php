@php
    use App\Models\Page;

    $pages = Page::where('id', 9)->first();
@endphp
<body class="bg-light">
    <div class="container mt-4  p-4 ">
        <h2 class="text-center pb-4 fw-bold">Social Media Solution Package</h2>
           <div class="container section-description" data-aos="fade-up">

        {!! $pages->description !!}
    </div>
        <style>
            .hover-effect {
                transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            }
            .hover-effect:hover {
                transform: scale(1.05);
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            }
        </style>
        <div class="row g-3 mt-3 pb-3">  <!-- Grid with gap -->
            <div class="col-md-4 d-flex justify-content-center">
                <a href="{{ route('enquire') }}" class="text-decoration-none">
                    <div class="p-2 bg-white rounded shadow hover-effect"
                         style="background: linear-gradient(135deg, #6a68AF, #6a68AF);">
                        <img src="{{ asset('img/1.jpg') }}" class="img-fluid rounded" alt="Image 1">
                    </div>
                </a>
            </div>
            <div class="col-md-4 d-flex justify-content-center">
                <a href="{{ route('enquire') }}" class="text-decoration-none">
                    <div class="p-2 bg-white rounded shadow hover-effect"
                         style="background: linear-gradient(135deg, #6a68AF, #6a68AF);">
                        <img src="{{ asset('img/2.jpg') }}" class="img-fluid rounded" alt="Image 1">
                    </div>
                </a>
            </div>
            <div class="col-md-4 d-flex justify-content-center">
                <a href="{{ route('enquire') }}" class="text-decoration-none">
                    <div class="p-2 bg-white rounded shadow hover-effect"
                         style="background: linear-gradient(135deg, #6a68AF, #6a68AF);">
                        <img src="{{ asset('img/3.jpg') }}" class="img-fluid rounded" alt="Image 1">
                    </div>
                </a>
            </div>
        </div>



        {{-- <div class="mt-5  m-3  p-4 rounded shadow"
        style="background: linear-gradient(135deg, #f8f9fa, #e9ecef); border-left: 5px solid #6a68AF;">
         <h5 class="fw-bold text-primary mb-3">📌 Note: <span class="text-black  fw-norma">Optional boosting service available for Facebook/Instagram:</span></h5>
         <p class="text-dark"></p>

         <div class="table-responsive">
             <table class="table table-bordered bg-white">
                 <tbody>
                     <tr class="">
                         <th class="text-start p-2">🚀 Boost</th>
                         <td class="p-2">$50 - $300</td>
                     </tr>
                     <tr>
                         <th class="text-start p-2">💰 Cost</th>
                         <td class="p-2">NPR 175 per USD</td>
                     </tr>
                     <tr class="">
                         <th class="text-start p-2">📈 Estimated Reach</th>
                         <td class="p-2">186K - 1.1M</td>
                     </tr>
                 </tbody>
             </table>
         </div>
     </div> --}}



    </div>
</body>
