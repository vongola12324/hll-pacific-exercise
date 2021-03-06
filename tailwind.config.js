/* eslint-disable */
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: {
        content: [
            './resources/**/*.blade.php',
            './resources/**/*.{vue,js,ts,jsx,tsx}',
            'node_modules/vue-tailwind/dist/*.js',
        ],
    },

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
        minHeight: {
            '0': '0',
            '1/4': '25vh',
            '1/2': '50vh',
            '3/4': '75vh',
            'full': '100vh',
            '1': '10%',
            '2': '20%',
            '3': '30%',
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [
        require('@tailwindcss/forms')
    ],
};
