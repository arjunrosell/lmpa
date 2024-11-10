<x-layout>
    <x-page-title>Email Verification</x-page-title>
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
                        Verify Your Email Address
                    </h2>
                    <div class="mt-1 text-sm text-black">
                        Check your inbox for the verification email. Didn’t get
                        it? Request a new one below.
                    </div>
                </div>
                <x-forms.form
                    action="{{ route('verification.send') }}"
                    method="POST"
                >
                    @csrf
                    <x-button>Request Another Verification Email</x-button>
                </x-forms.form>
            </div>
        </div>
    </div>
</x-layout>
