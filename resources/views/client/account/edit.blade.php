@include('layouts.client')
<x-page-title>{{ $user->name }}</x-page-title>
@include('layouts.admin.sidebar.navigation-menu')
<x-forms.container>
    <x-forms.title>Update your account</x-forms.title>
    <x-forms.divider />
    <x-forms.form
        method="POST"
        action="{{ route('client.account.update', $user->id) }}"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')
        <div class="mb-6 grid gap-4 sm:grid-cols-1 sm:gap-6">
            <x-forms.input
                label="Full Name"
                name="name"
                :value="$user->name"
            />
            <x-forms.input
                type="email"
                label="Email"
                name="email"
                :value="$user->email"
            />
            <x-forms.input
                type="password"
                label="Password"
                name="password"
                :required="false"
                placeholder="••••••••"
            />
            <x-forms.input
                type="password"
                label="Password Confirmation"
                name="password_confirmation"
                :required="false"
                placeholder="••••••••"
            />
        </div>
        <div class="mt-4 flex items-center space-x-3 sm:space-x-4">
            <x-button>Update</x-button>
            <x-cancel href="{{ route('client.index') }}">Cancel</x-cancel>
        </div>
    </x-forms.form>
</x-forms.container>
