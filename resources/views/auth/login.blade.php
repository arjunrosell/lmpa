<x-layout>
    <x-page-title>Login</x-page-title>
    <div
        class="mx-auto flex h-screen w-full max-w-sm items-center justify-center p-2 pt-24 sm:max-w-md sm:p-8 sm:pt-28 md:max-w-lg md:p-10 md:pt-32 lg:max-w-xl lg:p-12 lg:pt-36"
    >
        <div
            class="w-full rounded-lg border border-gray-200 shadow dark:border-gray-600 dark:bg-gray-800"
        >
            <div
                class="relative overflow-hidden rounded-lg bg-white p-6 py-10 dark:bg-gray-800"
            >
                <div class="mb-4">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                        Login to Lister Motor Parts & Accessories
                    </h2>
                </div>
                <x-forms.form method="POST" action="{{ route('login.store') }}">
                    @csrf
                    <div class="mb-4 grid gap-6 sm:grid-cols-1 sm:gap-4">
                        <x-forms.input
                            type="email"
                            label="Email"
                            name="email"
                            placeholder="name@example.com"
                        />
                        <x-forms.input
                            type="password"
                            label="Password"
                            name="password"
                            placeholder="••••••••"
                        />
                    </div>
                    <div
                        class="mb-4 flex items-center justify-between space-x-4 sm:space-x-3"
                    >
                        <a
                            href="{{ route('password.request') }}"
                            class="text-sm text-black underline"
                        >
                            Forgot your password?
                        </a>
                    </div>
                    <x-button id="loginButton">Login</x-button>

                    <div class="mt-4 text-sm text-black">
                        Don't have an account yet?
                        <a href="{{ route('register') }}" class="underline">
                            Register.
                        </a>
                    </div>
                </x-forms.form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function handleButtonClick(buttonId) {
                const submitButton = document.getElementById(buttonId)
                if (submitButton) {
                    submitButton.addEventListener('click', function () {
                        submitButton.disabled = true
                        submitButton.closest('form').submit()
                    })
                }
            }
            handleButtonClick('loginButton')
        })
    </script>
</x-layout>
