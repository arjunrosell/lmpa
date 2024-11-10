<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin Dashboard - Online Inventory Management System</title>
        <link rel="icon" href="{{ asset('favicon.png') }}" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
            rel="stylesheet"
        />
    </head>
    <body
        class="mx-auto h-screen max-w-full bg-gray-50 antialiased dark:bg-gray-900"
    >
        <main>
            <nav
                class="fixed left-0 right-0 top-0 z-50 border-b border-gray-200 bg-white px-4 py-2.5 dark:border-gray-700 dark:bg-gray-800"
            >
                <div class="flex flex-wrap items-center justify-between">
                    <div class="flex items-center justify-start">
                        <button
                            data-drawer-target="drawer-navigation"
                            data-drawer-toggle="drawer-navigation"
                            aria-controls="drawer-navigation"
                            class="mr-2 cursor-pointer rounded-lg p-2 text-gray-600 hover:bg-gray-100 hover:text-gray-900 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:bg-gray-700 dark:focus:ring-gray-700 lg:hidden"
                        >
                            <svg
                                aria-hidden="true"
                                class="h-6 w-6"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                            <svg
                                aria-hidden="true"
                                class="hidden h-6 w-6"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                            <span class="sr-only">Toggle sidebar</span>
                        </button>
                        <x-company-name>LMPA</x-company-name>
                    </div>
                    <div class="flex items-center space-x-2">
                        @guest
                            <x-navbar-link
                                href="{{ route('login') }}"
                                :active="request()->is('login')"
                            >
                                Login
                            </x-navbar-link>
                            <x-navbar-link
                                href="{{ route('register') }}"
                                :active="request()->is('register')"
                            >
                                Register
                            </x-navbar-link>
                        @endguest

                        @auth
                            <button
                                type="button"
                                class="mx-3 flex rounded-full text-sm focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600 md:mr-0"
                                id="user-menu-button"
                                aria-expanded="false"
                                data-dropdown-toggle="dropdown"
                            >
                                <span class="sr-only">Open user menu</span>
                                <img
                                    src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&size=32&bold=true&rounded=true&background=000000&color=fff"
                                />
                            </button>
                            <!-- Dropdown menu -->
                            <div
                                class="z-50 my-4 hidden w-56 list-none divide-y divide-gray-100 rounded-xl bg-white text-base shadow dark:divide-gray-600 dark:bg-gray-700"
                                id="dropdown"
                            >
                                <div class="space-y-2 px-4 py-3">
                                    <div class="flex items-center">
                                        <div
                                            class="text-base font-semibold leading-5 text-gray-900 dark:text-white"
                                        >
                                            {{ auth()->user()->name }}
                                        </div>
                                        <span
                                            class="ml-2 inline-flex items-center justify-center rounded-full bg-black px-2 py-1.5 align-middle text-[0.6rem] font-semibold leading-none text-white"
                                        >
                                            {{ strtoupper( auth()->user()->roles->first()->name,) }}
                                        </span>
                                    </div>
                                    <span
                                        class="block truncate text-sm text-gray-900 dark:text-white"
                                    >
                                        {{ auth()->user()->email }}
                                    </span>
                                </div>

                                <ul
                                    class="text-gray-700 dark:text-gray-300"
                                    aria-labelledby="dropdown"
                                >
                                    <li>
                                        <a
                                            href="{{ route('admin.account.edit') }}"
                                            class="block px-4 py-3 text-sm hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                        >
                                            Settings
                                        </a>
                                    </li>
                                </ul>
                                <ul
                                    class="text-gray-700 dark:text-gray-300"
                                    aria-labelledby="dropdown"
                                >
                                    <li>
                                        <form
                                            method="POST"
                                            action="{{ route('logout') }}"
                                        >
                                            @csrf
                                            <button
                                                type="submit"
                                                class="block w-full px-4 py-3 text-left text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                            >
                                                Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endauth
                    </div>
                </div>
            </nav>
            @yield('content')
        </main>
    </body>
</html>
