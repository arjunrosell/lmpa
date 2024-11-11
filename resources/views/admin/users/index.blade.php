@include('layouts.admin')
<x-page-title>Users</x-page-title>
@include('layouts.admin.sidebar.navigation-menu')
<x-forms.container>
    <div
        class="flex flex-col items-center justify-between space-y-3 pb-4 md:flex-row md:space-x-4 md:space-y-0"
    >
        <x-search-form :action="route('admin.users.index')" />

        <div
            class="flex w-full flex-shrink-0 flex-col items-stretch justify-end space-y-2 md:w-auto md:flex-row md:items-center md:space-x-3 md:space-y-0"
        >
            <x-button href="{{ route('admin.users.create') }}">
                <svg
                    class="mr-2 h-3.5 w-3.5"
                    fill="currentColor"
                    viewbox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                >
                    <path
                        clip-rule="evenodd"
                        fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                    />
                </svg>
                Add User
            </x-button>
        </div>
    </div>
    <div class="h-full overflow-x-auto">
        <table
            class="w-full text-left text-sm text-gray-500 dark:text-gray-400"
        >
            <thead
                class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400"
            >
                <tr>
                    <th scope="col" class="px-4 py-3">Name</th>
                    <th scope="col" class="px-4 py-3">Email</th>
                    <th scope="col" class="px-4 py-3">Role</th>
                    <th scope="col" class="px-4 py-3">Created</th>
                    <th scope="col" class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($users as $user)
                    <tr class="border-b dark:border-gray-700">
                        <th
                            scope="row"
                            class="flex items-center gap-2 whitespace-nowrap px-4 py-3 font-medium text-gray-900 dark:text-white"
                        >
                            <img
                                src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&size=28&bold=true&rounded=true&background=000000&color=fff"
                            />
                            {{ $user->name }}
                        </th>
                        <td class="px-4 py-3">{{ trim($user->email) }}</td>
                        <td class="px-4 py-3">
                            <span
                                class="inline-flex items-center justify-center rounded-full bg-black px-2.5 py-1.5 align-middle text-[0.6rem] font-semibold leading-none text-white"
                            >
                                {{ strtoupper($user->roles->first()->name ?? 'None') }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            {{ $user->created_at ? $user->created_at->format('Y/m/d') : '' }}
                        </td>

                        <td class="flex items-center justify-end px-4 py-3">
                            <button
                                id="user-{{ $user->id }}-dropdown-button"
                                data-dropdown-toggle="user-{{ $user->id }}-dropdown"
                                class="inline-flex items-center rounded-lg p-0.5 text-center text-sm font-medium text-gray-500 hover:text-gray-800 focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                type="button"
                            >
                                <svg
                                    class="h-5 w-5"
                                    aria-hidden="true"
                                    fill="currentColor"
                                    viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"
                                    />
                                </svg>
                            </button>
                            <div
                                id="user-{{ $user->id }}-dropdown"
                                class="z-10 hidden w-44 divide-y divide-gray-100 rounded bg-white shadow dark:divide-gray-600 dark:bg-gray-700"
                            >
                                <ul
                                    class="text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="user-{{ $user->id }}-dropdown-button"
                                >
                                    <li>
                                        <a
                                            href="{{ route('admin.users.edit', $user->id) }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                        >
                                            Edit
                                        </a>
                                    </li>
                                </ul>
                                <form
                                    action="{{ route('admin.users.destroy', $user->id) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white"
                                    >
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr
                        class="border-b bg-white dark:border-gray-700 dark:bg-gray-800"
                    >
                        <th
                            scope="row"
                            class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                        >
                            No users found.
                        </th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- pagination --}}
    <div class="pt-4 sm:px-0">
        {{ $users->links() }}
    </div>
</x-forms.container>
