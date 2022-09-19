<!-- Footer Start -->
<div class="container-fluid bg-light pt-5 px-sm-3 px-md-5">
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-5">
            <a href="index.html" class="navbar-brand">
                <h2 class="mb-2 mt-n2 display-5 text-uppercase"><span class="text-primary">Kampung</span>Karet</h2>
            </a>
            <p>
                Kampung karet merupakan sebuah perkampungan yang terletak di daerah Batu Besar yang merupakan salah satu
                kmapung tua di daerah Batu besar yang dekat dengan pesisir pantai

            </p>
            <div class="d-flex justify-content-start mt-4">
                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                    href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                    href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                    href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                    href="#"><i class="fab fa-instagram"></i></a>
                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                    href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h4 class="font-weight-bold mb-4">Kategori</h4>
            <div class="d-flex flex-wrap m-n1">
                @foreach (App\Models\Category::orderBy('name', 'asc')->get() as $category)
                <a href="" class="btn btn-sm btn-outline-secondary m-1">{{ucfirst($category['name'])}}</a>
                @endforeach
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h4 class="font-weight-bold mb-4">Subkategori</h4>
            <div class="d-flex flex-wrap m-n1">
                @foreach (App\Models\SubCategory::orderBy('subname', 'asc')->limit(6)->get() as $SubCategory)
                <a href="" class="btn btn-sm btn-outline-secondary m-1">{{ucwords($SubCategory['subname'])}}</a>
                @endforeach
                <a href="" class="btn btn-sm btn-outline-secondary m-1">Semua</a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h4 class="font-weight-bold mb-4">Pintasan</h4>
            <div class="d-flex flex-column justify-content-start">
                <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>Tentang Kami</a>
                <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>Hubungi Kami</a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4 px-sm-3 px-md-5">
    <p class="m-0 text-center">
        &copy; <a class="font-weight-bold" href="#">kpkaret.com</a>. All Rights Reserved.

        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
        Designed by <a class="font-weight-bold" href="https://htmlcodex.com">HTML Codex</a>
    </p>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-dark back-to-top"><i class="fa fa-angle-up"></i></a>