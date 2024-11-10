@include('layouts.admin')
<x-page-title>Add New User</x-page-title>
@include('layouts.admin.sidebar.navigation-menu')
<x-forms.container>
    <x-forms.title>Add New User</x-forms.title>
    <x-forms.divider />
    <x-forms.form method="POST" action="{{ route('admin.users.store') }}">
        @csrf
        <div class="mb-6 grid gap-4 sm:grid-cols-1 sm:gap-6">
            <x-forms.input label="Full Name" name="name" />
            <x-forms.input type="email" label="Email" name="email" />
            <x-forms.select type="select" label="Roles" name="roles[]">
                @if (! is_null($roles) && count($roles) > 0)
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">
                            {{ ucfirst($role->name) }}
                        </option>
                    @endforeach
                @else
                    <option value="">No roles available</option>
                @endif
            </x-forms.select>
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
        <div class="mt-4 flex items-center space-x-3 sm:space-x-4">
            <x-button>Add User</x-button>
            <x-cancel href="{{ route('admin.users.index') }}">Cancel</x-cancel>
        </div>
    </x-forms.form>
</x-forms.container>
