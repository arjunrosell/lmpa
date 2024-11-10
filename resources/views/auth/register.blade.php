<x-layout>
    <x-page-title>Register</x-page-title>
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
                        Create an account
                    </h2>
                </div>
                <x-forms.form
                    method="POST"
                    action="{{ route('register.store') }}"
                >
                    @csrf
                    <div class="mb-5 grid gap-6 sm:grid-cols-1 sm:gap-4">
                        <x-forms.input label="Full Name" name="name" />
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
                        <x-forms.input
                            type="password"
                            label="Password Confirmation"
                            name="password_confirmation"
                            placeholder="••••••••"
                        />
                    </div>
                    <x-button>Register</x-button>

                    <div class="mt-4 text-sm text-black">
                        Already have an account?
                        <a href="{{ route('login') }}" class="underline">
                            Login.
                        </a>
                    </div>
                </x-forms.form>
            </div>
        </div>
    </div>
</x-layout>
