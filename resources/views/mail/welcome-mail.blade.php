<x-mail::message>
    <div class="bg-gray-100 px-4 py-12 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl rounded-lg bg-white p-8 shadow-lg">
            <div class="mb-8 text-center">
                <h1 class="text-2xl font-bold text-gray-900">
                    Welcome to Lister Motor Parts & Accessories,
                    {{ $user->name }}!
                </h1>
            </div>
            <div class="text-base leading-6 text-gray-700">
                <p class="mb-4">
                    We are excited to have you as part of our community at
                    Lister. To ensure you have the best experience, please
                    verify your account to get started!
                </p>
                <p class="mb-4">
                    Once verified, you can log in to your account by clicking
                    the button below:
                </p>
                <p>
                    <a
                        href="{{ url('/') }}"
                        style="
                            display: inline-block;
                            padding: 8px 32px;
                            font-weight: 600;
                            font-size: 16px;
                            line-height: 1.5em;
                            color: #ffffff;
                            background-color: #000000;
                            text-decoration: none;
                            border-radius: 5px;
                            text-align: center;
                        "
                    >
                        Login
                    </a>
                </p>
            </div>
            <div class="mt-8 text-center text-sm text-gray-600">
                <p style="margin-bottom: 0">Best regards,</p>
                <p class="font-semibold">The Lister Team</p>
            </div>
        </div>
    </div>
</x-mail::message>
