<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>
            @yield('title') Home - Lister Motor Parts & Accessories
        </title>
        <link rel="icon" href="{{ asset('lmpa.png') }}" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
            rel="stylesheet"
        />
        <style>
            :root {
                --primary-color: #f98931;
            }
        </style>
    </head>
    <body class="bg-gray-100 text-gray-800">
        <!-- Header -->
        <header class="bg-black py-4 text-white">
            <div
                class="container mx-auto flex flex-wrap items-center justify-between px-6"
            >
                <h1 class="text-2xl font-bold">
                    <a href="/" class="hover:text-gray-400">LMPA</a>
                </h1>
                <nav class="hidden md:flex">
                    <ul class="flex space-x-6">
                        <li>
                            <a href="#about" class="hover:text-gray-400">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="#products" class="hover:text-gray-400">
                                Products
                            </a>
                        </li>
                        <li>
                            <a href="#contact" class="hover:text-gray-400">
                                Contact
                            </a>
                        </li>
                        <li>
                            <a href="/login" class="hover:text-gray-400">
                                Login
                            </a>
                        </li>
                        <li>
                            <a href="/register" class="hover:text-gray-400">
                                Register
                            </a>
                        </li>
                    </ul>
                </nav>
                <button
                    id="menu-toggle"
                    class="text-white focus:outline-none md:hidden"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>
                </button>
                <nav
                    id="mobile-menu"
                    class="mt-4 hidden w-full flex-col space-y-4 md:hidden"
                >
                    <ul class="space-y-2">
                        <li>
                            <a href="#about" class="block hover:text-gray-400">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a
                                href="#services"
                                class="block hover:text-gray-400"
                            >
                                Products
                            </a>
                        </li>
                        <li>
                            <a
                                href="#contact"
                                class="block hover:text-gray-400"
                            >
                                Contact
                            </a>
                        </li>
                        <li>
                            <a href="/login" class="hover:text-gray-400">
                                Login
                            </a>
                        </li>
                        <li>
                            <a href="/register" class="hover:text-gray-400">
                                Register
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

        <section
            id="home"
            class="relative h-[350px] bg-cover bg-center sm:h-[450px] md:h-[550px] lg:h-[650px]"
            style="background-image: url('/images/banner.webp')"
        >
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            <div class="relative z-10 flex h-full items-center justify-center">
                <div class="px-4 text-center text-white sm:px-6 md:px-8">
                    <h2
                        class="mb-4 text-[24px] font-bold sm:text-[24px] md:text-[32px] lg:text-[40px]"
                    >
                        Your One-Stop Shop for Motor Parts
                    </h2>
                    <p class="mb-4 text-[16px] sm:text-[16px] md:text-[16px]">
                        High-quality motor parts and accessories at unbeatable
                        prices!
                    </p>
                    <a
                        href="#services"
                        class="rounded-md bg-[var(--primary-color)] px-4 py-2 text-black shadow hover:bg-orange-400"
                    >
                        Explore Our Products
                    </a>
                </div>
            </div>
        </section>

        <section
            id="about"
            class="h-[400px] bg-white py-8 sm:h-[300px] sm:py-12"
        >
            <div
                class="container mx-auto flex h-full flex-col items-center justify-center px-6 sm:px-4"
            >
                <h3 class="mb-6 text-center text-2xl font-bold sm:text-3xl">
                    About Us
                </h3>
                <p class="mx-auto max-w-4xl text-center text-base sm:text-lg">
                    At Lister Motor Parts & Accessories, we specialize in
                    providing top-quality motor parts and accessories to meet
                    all your needs. Our mission is to deliver reliable products
                    that ensure the safety and efficiency of your ride. With
                    years of experience in the industry, we are committed to
                    serving our customers with integrity, professionalism, and
                    excellence.
                </p>
            </div>
        </section>

        <section id="products" class="py-12">
            <div class="container mx-auto px-6">
                <div class="mb-12 text-center">
                    <h3 class="mb-8 text-[16px] font-bold sm:text-3xl">
                        Our Products
                    </h3>
                    <p class="mx-auto max-w-3xl text-[16px] sm:text-lg">
                        At Lister Motor Parts & Accessories, we offer a wide
                        range of high-quality products designed to enhance the
                        performance, safety, and appearance of your motorcycle.
                        Whether you're looking for durable tires, advanced
                        suspension systems, or high-performance electronics, we
                        have the right products to meet your needs.
                    </p>
                </div>
                <div
                    class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3"
                >
                    <div
                        class="flex min-h-[300px] flex-col justify-between rounded-lg bg-white p-6 shadow"
                    >
                        <img
                            src="/images/engine-parts.webp"
                            alt="Engine"
                            class="mb-4 h-[300px] w-full rounded-lg object-cover"
                        />
                        <h4 class="mb-2 text-xl font-bold">Engine Parts</h4>
                        <p>
                            Top-quality engine components to keep your ride
                            running smoothly.
                        </p>
                    </div>
                    <div
                        class="flex min-h-[300px] flex-col justify-between rounded-lg bg-white p-6 shadow"
                    >
                        <img
                            src="/images/tires-and-wheels.webp"
                            alt="Tires"
                            class="mb-4 h-[300px] w-full rounded-lg object-cover"
                        />
                        <h4 class="mb-2 text-xl font-bold">Tires & Wheels</h4>
                        <p>
                            Durable and reliable tires for all types of
                            motorbikes.
                        </p>
                    </div>
                    <div
                        class="flex min-h-[300px] flex-col justify-between rounded-lg bg-white p-6 shadow"
                    >
                        <img
                            src="/images/brakes.webp"
                            alt="Brakes"
                            class="mb-4 h-[300px] w-full rounded-lg object-cover"
                        />
                        <h4 class="mb-2 text-xl font-bold">Braking Systems</h4>
                        <p>
                            Safety-first braking systems to ensure your peace of
                            mind.
                        </p>
                    </div>
                    <div
                        class="flex min-h-[300px] flex-col justify-between rounded-lg bg-white p-6 shadow"
                    >
                        <img
                            src="/images/helmet.webp"
                            alt="Helmet"
                            class="mb-4 h-[300px] w-full rounded-lg object-cover"
                        />
                        <h4 class="mb-2 text-xl font-bold">Helmet</h4>
                        <p>
                            High-quality helmets for safety and comfort on every
                            ride.
                        </p>
                    </div>
                    <div
                        class="flex min-h-[300px] flex-col justify-between rounded-lg bg-white p-6 shadow"
                    >
                        <img
                            src="/images/rim.webp"
                            alt="Rim"
                            class="mb-4 h-[300px] w-full rounded-lg object-cover"
                        />
                        <h4 class="mb-2 text-xl font-bold">Rim</h4>
                        <p>
                            Durable rims designed for strength and performance.
                        </p>
                    </div>
                    <div
                        class="flex min-h-[300px] flex-col justify-between rounded-lg bg-white p-6 shadow"
                    >
                        <img
                            src="/images/shock.webp"
                            alt="Shock"
                            class="mb-4 h-[300px] w-full rounded-lg object-cover"
                        />
                        <h4 class="mb-2 text-xl font-bold">Shock Absorbers</h4>
                        <p>
                            High-performance shock absorbers for a smoother and
                            safer ride.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section
            id="cta"
            class="flex h-[350px] items-center justify-center bg-[var(--primary-color)] text-white"
        >
            <div class="container mx-auto px-6 text-center">
                <h3 class="mb-4 text-3xl font-bold">
                    Looking for Quality Motor Parts?
                </h3>
                <p class="mb-6">
                    Explore our inventory system to find the perfect parts for
                    your ride.
                </p>
                <a
                    href="https://www.facebook.com/profile.php?id=100083305864216"
                    class="rounded-md bg-white px-6 py-3 text-[var(--primary-color)] shadow hover:bg-gray-200"
                >
                    Get in Touch
                </a>
            </div>
        </section>

        <section id="contact" class="bg-white py-12">
            <div class="container mx-auto px-6 text-center">
                <h3 class="mb-6 text-3xl font-bold">Contact Us</h3>
                <p class="text-lg">
                    Sabang, Danao City, Central Visayas, Philippines
                </p>
                <p class="mt-4">
                    Phone:
                    <a
                        href="tel:+1234567890"
                        class="text-[var(--primary-color)] hover:underline"
                    >
                        +63 923 456 7890
                    </a>
                </p>
                <p>
                    Email:
                    <a
                        href="mailto:info@listerparts.com"
                        class="text-[var(--primary-color)] hover:underline"
                    >
                        info@lmpa.shop
                    </a>
                </p>
            </div>
        </section>

        <footer class="bg-gray-800 py-6 text-white">
            <div class="container mx-auto px-6 text-center">
                <p class="mb-4">
                    © 2024 Lister Motor Parts & Accessories. All Rights
                    Reserved.
                </p>
                <div class="flex justify-center space-x-4">
                    <a
                        href="https://www.facebook.com/profile.php?id=100083305864216"
                        class="hover:text-[var(--primary-color)]"
                    >
                        Facebook
                    </a>
                    <a
                        href="https://api.whatsapp.com/send?phone=%2B639564319244"
                        class="hover:text-[var(--primary-color)]"
                    >
                        Whatsapp
                    </a>
                </div>
            </div>
        </footer>

        <script>
            document
                .getElementById('menu-toggle')
                .addEventListener('click', function () {
                    const menu = document.getElementById('mobile-menu')
                    menu.classList.toggle('hidden')
                })
        </script>
    </body>
</html>
