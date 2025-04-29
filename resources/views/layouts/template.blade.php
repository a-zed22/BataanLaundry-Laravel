<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Bulla Crave Bataan')</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite('resources/css/headerfooter.css')
    @vite('resources/css/3D.css')
    @vite('resources/css/profteam.css')
    @vite('resources/css/testimonial.css')
    @vite('resources/css/style.css')
    @vite(entrypoints: 'resources/js/viewimage.js')
    @vite(entrypoints: 'resources/js/testimonial.js')
    @vite(entrypoints: 'resources/js/headerscroll.js')
    @vite('resources/js/product.js')
</head>

<body>
    <!--Header Start-->
    <header class="header">
        <div class="logo">
            <a href="LandingPage.blade.php">
                <img src="{{ asset(path: 'images/Bulla Crave Logo.png') }}">
        </div>
        <nav class="nav-links">
            <a href="#">HOME</a>
            <a href="#">ABOUT</a>
            <a href="#">CONTACT</a>
            <a href="#">PRODUCTS</a>
        </nav>
    </header>

    @yield('LandingContent')
    @yield('OpeningContent')
    @yield('StoreInfoContent')





    <main class="container">
        @yield('WelcomeContent')
        @yield('ChooseUsContent')
        @yield('3DContent')
        @yield('ProductContent')
        @yield('TestimonialContent')
    </main>
    @yield('TeamContent')



    <!--Footer Start-->
    <footer>
        <div class="footercontainer">
            <div class="SocialIcons">
                <a href=""><i class="fa-brands fa-facebook"></i> </a>
                <a href=""><i class="fa-brands fa-instagram"></i> </a>
                <a href=""><i class="fa-brands fa-tiktok"></i> </a>
            </div>

            <div class="footerNav">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Products</a></li>
                    <li><a href="">Contacts</a></li>
                    <li><a href="">Our Team</a></li>
                </ul>
            </div>
        </div>
        <div class="footerBottom">
            <p>Copyright &copy; Bulla Crave Laundry Lounge Bataan 2025</p>
        </div>
    </footer>

    <!-- jQuery (Needed for custom scrolling) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
