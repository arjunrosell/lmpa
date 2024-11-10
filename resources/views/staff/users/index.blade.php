@include('layouts.staff')
<x-page-title>Users</x-page-title>
@include('layouts.staff.sidebar.navigation-menu')
<x-forms.container>
    <div
        class="flex flex-col items-center justify-between space-y-3 pb-4 md:flex-row md:space-x-4 md:space-y-0"
    >
        <div class="w-full md:w-1/2">
            <form class="flex items-center">
                <div class="relative w-full">
                    <div
                        class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3"
                    >
                        <svg
                            aria-hidden="true"
                            class="h-5 w-5 text-gray-500 dark:text-gray-400"
                            fill="currentColor"
                            viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </div>
                    <input
                        type="text"
                        id="simple-search"
                        class="focus:ring-primary-500 focus:border-primary-500 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 pl-10 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                        placeholder="Search"
                        required=""
                    />
                </div>
            </form>
        </div>
        <div
            class="flex w-full flex-shrink-0 flex-col items-stretch justify-end space-y-2 md:w-auto md:flex-row md:items-center md:space-x-3 md:space-y-0"
        >
            <x-button href="{{ route('staff.users.create') }}">
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
            <div class="flex w-full items-center space-x-3 md:w-auto">
                <button
                    id="actionsDropdownButton"
                    data-dropdown-toggle="actionsDropdown"
                    class="hover:text-primary-700 flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 md:w-auto"
                    type="button"
                >
                    <svg
                        class="-ml-1 mr-1.5 h-5 w-5"
                        fill="currentColor"
                        viewbox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true"
                    >
                        <path
                            clip-rule="evenodd"
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        />
                    </svg>
                    Actions
                </button>
                <div
                    id="actionsDropdown"
                    class="z-10 hidden w-44 divide-y divide-gray-100 rounded bg-white shadow dark:divide-gray-600 dark:bg-gray-700"
                >
                    <ul
                        class="py-1 text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="actionsDropdownButton"
                    >
                        <li>
                            <a
                                href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                            >
                                Mass Edit
                            </a>
                        </li>
                    </ul>
                    <div class="py-1">
                        <a
                            href="#"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white"
                        >
                            Delete all
                        </a>
                    </div>
                </div>
                <button
                    id="filterDropdownButton"
                    data-dropdown-toggle="filterDropdown"
                    class="hover:text-primary-700 flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 md:w-auto"
                    type="button"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true"
                        class="mr-2 h-4 w-4 text-gray-400"
                        viewbox="0 0 20 20"
                        fill="currentColor"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                            clip-rule="evenodd"
                        />
                    </svg>
                    Filter
                    <svg
                        class="-mr-1 ml-1.5 h-5 w-5"
                        fill="currentColor"
                        viewbox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true"
                    >
                        <path
                            clip-rule="evenodd"
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        />
                    </svg>
                </button>
                <div
                    id="filterDropdown"
                    class="z-10 hidden w-48 rounded-lg bg-white p-3 shadow dark:bg-gray-700"
                >
                    <h6
                        class="mb-3 text-sm font-medium text-gray-900 dark:text-white"
                    >
                        Choose brand
                    </h6>
                    <ul
                        class="space-y-2 text-sm"
                        aria-labelledby="filterDropdownButton"
                    >
                        <li class="flex items-center">
                            <input
                                id="apple"
                                type="checkbox"
                                value=""
                                class="text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 h-4 w-4 rounded border-gray-300 bg-gray-100 focus:ring-2 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700"
                            />
                            <label
                                for="apple"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100"
                            >
                                Apple (56)
                            </label>
                        </li>
                        <li class="flex items-center">
                            <input
                                id="fitbit"
                                type="checkbox"
                                value=""
                                class="text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 h-4 w-4 rounded border-gray-300 bg-gray-100 focus:ring-2 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700"
                            />
                            <label
                                for="fitbit"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100"
                            >
                                Microsoft (16)
                            </label>
                        </li>
                        <li class="flex items-center">
                            <input
                                id="razor"
                                type="checkbox"
                                value=""
                                class="text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 h-4 w-4 rounded border-gray-300 bg-gray-100 focus:ring-2 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700"
                            />
                            <label
                                for="razor"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100"
                            >
                                Razor (49)
                            </label>
                        </li>
                        <li class="flex items-center">
                            <input
                                id="nikon"
                                type="checkbox"
                                value=""
                                class="text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 h-4 w-4 rounded border-gray-300 bg-gray-100 focus:ring-2 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700"
                            />
                            <label
                                for="nikon"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100"
                            >
                                Nikon (12)
                            </label>
                        </li>
                        <li class="flex items-center">
                            <input
                                id="benq"
                                type="checkbox"
                                value=""
                                class="text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 h-4 w-4 rounded border-gray-300 bg-gray-100 focus:ring-2 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700"
                            />
                            <label
                                for="benq"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100"
                            >
                                BenQ (74)
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
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
                                            href="{{ route('staff.users.edit', $user->id) }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                        >
                                            Edit
                                        </a>
                                    </li>
                                </ul>
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
