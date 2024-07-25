@include('auth.blocks.head')

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <div id="preloader" class="preloader">
        <div class='inner'>
            <div class='line1'></div>
            <div class='line2'></div>
            <div class='line3'></div>
        </div>
    </div>
    <section class="fxt-template-animation fxt-template-layout9"
        data-bg-image="{{ asset('assets/auth/img/figure/bg9-l.jpg') }}">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-3">
                    <div class="fxt-header">
                        <a href="login-9.html" class="fxt-logo"><img src="{{ asset('assets/auth/img/logo-9.png') }}"
                                alt="Logo"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="fxt-content">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('auth.blocks.js')

</body>


<!-- Mirrored from affixtheme.com/html/xmee/demo/login-9.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Jul 2024 15:02:47 GMT -->

</html>
