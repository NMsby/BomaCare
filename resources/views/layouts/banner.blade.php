<div class="wrap bg-gray-200">
    <div class="container">
        <div class="row py-2">
            <div class="col-3 col-md-3 d-flex align-items-center"></div>
            <div class="col-6 col-md-6 d-flex align-items-center">
                <div class="flex flex-wrap items-center gap-x-4">
                    <p class="text-sm leading-6 text-black">
                        SIGNUP NOW & ENJOY 30% DISCOUNT ON FIRST 5 ORDERS
                    </p>
                    @if (Route::has('login'))
                        @auth
                        @else
                            <a href="{{ route('register') }}" class="flex-none rounded-full bg-gray-900 px-3.5 py-1 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900">Register now <span aria-hidden="true">&rarr;</span></a>
                        @endauth
                    @endif
                </div>
            </div>
            <div class="col-3 col-md-3 d-flex justify-content-md-end">
                <div class="social-media">
                    <p class="mb-0 d-flex">
                        <a href="tel:+254759792595" class="d-flex align-items-center justify-content-center"><span class="fa fa-phone" style="color: black;"><i class="sr-only">Phone</i></span></a>
                        <a href="mailto: bomacare.ke@gmail.com" target="_blank" class="d-flex align-items-center justify-content-center"><span class="fa fa-envelope"  style="color: black;"><i class="sr-only">Mail</i></span></a>
                        <a href="#" target="_blank" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook" style="color: black;"><i class="sr-only">Facebook</i></span></a>
                        <a href="#" target="_blank" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter" style="color: black;"><i class="sr-only">Twitter</i></span></a>
                        <a href="#" target="_blank" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram" style="color: black;"><i class="sr-only">Instagram</i></span></a>
                        <a href="https://github.com/NMsby/BomaCare" target="_blank" class="d-flex align-items-center justify-content-center"><span class="fa fa-github"  style="color: black;"><i class="sr-only">Github</i></span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
