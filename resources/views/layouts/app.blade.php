
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel App')</title>
    <!-- Add your stylesheets, scripts, or other head content here -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>


<body>
    <section class="header">
        <div class="logo">
            <i class="ri-menu-line icon icon-0 menu"></i>
            <div class="logo-flex">
                <img src="{{ asset('images/logo.png') }}" alt="Main Logo">
            </div>
        </div>
        <div class="search--notification--profile">
            <div class="search">
                <input type="text" placeholder="Search..">
                <button><i class="ri-search-2-line"></i></button>
            </div>
            <div class="notification--profile">
                <div class="picon lock">
                    <i class="ri-lock-line"></i>
                </div>
                <div class="picon bell">
                    <i class="ri-notification-2-line"></i>
                    <span class="notify-circle">3</span>
                </div>
                <div class="picon chat">
                    <i class="ri-wechat-2-line"></i>
                </div>
                <div class="picon profile">
                    <img src="{{ asset('images/avatar.png') }}" alt="">
                    <p>Sarah Sandlem</p>
                </div>
            </div>
        </div>
    </section>
    <section class="main">
        <div class="sidebar">
            <ul class="sidebar--items">
                <li>
                    <a href="#" id="active--link">
                        <span class="icon icon-1"><img src="{{ asset('images/icons/icon_adjust.png') }}" alt="Adjust Icons" /></span>
                        <span class="sidebar--item">Adjust</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon icon-1"><img src="{{ asset('images/icons/icon_brushes.png') }}" alt="Adjust Icons" /></span>
                        <span class="sidebar--item">Brushes</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon icon-1"><img src="{{ asset('images/icons/icon _widgets.png') }}" alt="Adjust Icons" /></span>
                        <span class="sidebar--item">Elements</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon icon-1"><img src="{{ asset('images/icons/icon _scale.png') }}" alt="Adjust Icons" /></span>
                        <span class="sidebar--item">Frames</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon icon-1"><img src="{{ asset('images/icons/icon_smile.png') }}" alt="Adjust Icons" /></span>
                        <span class="sidebar--item">Icons</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon icon-1"><img src="{{ asset('images/icons/icon_image.png') }}" alt="Adjust Icons" /></span>
                        <span class="sidebar--item">Images</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon icon-1"><img src="{{ asset('images/icons/icon_qr.png') }}" alt="Adjust Icons" /></span>
                        <span class="sidebar--item">QR Code</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon icon-1"><img src="{{ asset('images/icons/icon_shapes.png') }}" alt="Adjust Icons" /></span>
                        <span class="sidebar--item">Shapes</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon icon-1"><img src="{{ asset('images/icons/icon_text.png') }}" alt="Adjust Icons" /></span>
                        <span class="sidebar--item">Text</span>
                    </a>
                </li>   
                <li>
                    <a href="#">
                        <span class="icon icon-1"><img src="{{ asset('images/icons/icon_settings.png') }}" alt="Adjust Icons" /></span>
                        <span class="sidebar--item">Settings</span>
                    </a>
                </li>                                                                                                                                                
            </ul>
            <div class="premium">
                <img src="{{ asset('images/diamond.png') }}" />
                <h2>Need More Features Go Premium</h2>
            </div>
        </div>
        <div class="main--content">
            <div class="scroller">
            <div class="container mx-auto py-10 h-64 px-6">
                    <h1>Edit Image</h1>
                        <!-- Remove class [ border-dashed border-2 border-gray-300 ] to remove dotted border -->
                        <div class="w-full rounded border-dashed border-2 border-gray-300 p-6">
                            @yield('content')
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ mix('resources/js/main.js') }}"></script>
</body>
</html>
