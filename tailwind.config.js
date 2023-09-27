const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    darkMode: 'class',
    safelist: [
        'sm:max-w-5xl'
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary': {
                    '50': '#f3f1ff',
                    '100': '#ebe5ff',
                    '200': '#d9ceff',
                    '300': '#bea6ff',
                    '400': '#9f75ff',
                    '500': '#843dff',
                    '600': '#7916ff',
                    '700': '#6b04fd',
                    '800': '#5a03d5',
                    '900': '#4b05ad',
                    '950': '#2c0076',
                },
                "main": "#9f75ff",
                "main-dark": "#6b04fd",
            },
            boxShadow: theme => ({
                outline: '0 0 0 2px ' + theme('colors.indigo.500'),
            }),
            fill: theme => theme('colors'),
            fontSize: {
                xxs: "0.6rem",
            },
            opacity: {
                '10': '0.1',
            }
        },
    },
    variants: {
        extend: {
            backgroundColor: ['active'],
        }
    },
    content: [
        './app/**/*.php',
        './resources/**/*.html',
        './resources/**/*.js',
        './resources/**/*.jsx',
        './resources/**/*.ts',
        './resources/**/*.tsx',
        './resources/**/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.vue',
        './resources/**/*.twig',
        './vendor/wire-elements/modal/resources/views/*.blade.php',
        './storage/framework/views/*.php',
    ],
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
