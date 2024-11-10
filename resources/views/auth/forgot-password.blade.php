<x-layout>
    <x-page-title>Forgot Password</x-page-title>
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
                        Forgot your password
                    </h2>
                    <div class="mt-1 text-sm text-black">
                        Enter your email and we'll send you a link to reset your
                        password.
                    </div>
                </div>
                <x-forms.form
                    action="{{route('password.request')}}"
                    method="POST"
                >
                    @csrf
                    <div class="mb-4 grid gap-6 sm:grid-cols-1 sm:gap-4">
                        <x-forms.input
                            type="email"
                            label="Email"
                            name="email"
                            placeholder="name@example.com"
                        />
                    </div>
                    <x-button>Submit</x-button>
                    <div class="mt-4 text-sm text-black">
                        Remembered your password?
                        <a href="{{ route('login') }}" class="underline">
                            Login.
                        </a>
                    </div>
                </x-forms.form>
            </div>
        </div>
    </div>
</x-layout>
