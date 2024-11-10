/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './node_modules/flowbite/**/*.js',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                primary: {
                    100: '#111827',
                },
                secondary: {
                    // Add your secondary color shades here
                },
                accent: {
                    300: '#18181b',
                    400: '#292929',
                },
                textColor: {
                    500: '#71717A',
                },
            },

            fontFamily: {
                sans: ['Inter', 'sans-serif'],
            },

            fontSize: {
                '2xs': '.625rem', //10px
            },
        },
    },
    plugins: [require('flowbite/plugin')],
}
