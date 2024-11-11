<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Brand Report</title>
        <link rel="icon" href="{{ asset('lmpa.png') }}" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100">
        <section
            class="flex min-h-screen items-center justify-center px-4 py-16"
        >
            <div
                class="w-full max-w-4xl rounded-lg px-6 py-8 md:px-8 md:py-12 lg:py-16"
            >
                <div class="flex flex-col items-center gap-6 text-center">
                    <img
                        src="{{ asset('images/1718004199.png') }}"
                        alt="under maintenance image"
                        class="w-full max-w-xs object-cover md:max-w-md lg:max-w-lg"
                    />
                    <h2
                        class="text-2xl font-bold text-gray-800 md:text-3xl lg:text-4xl"
                    >
                        We'll be back soon!
                    </h2>
                    <p
                        class="max-w-md text-sm text-gray-500 md:text-base lg:text-lg"
                    >
                        We're performing some maintenance. Please check back
                        later.
                    </p>
                </div>
            </div>
        </section>
    </body>
</html>
