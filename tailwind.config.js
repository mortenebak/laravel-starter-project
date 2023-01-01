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
                indigo: {
                    '900': '#191e38',
                    '800': '#2f365f',
                    '600': '#5661b3',
                    '500': '#6574cd',
                    '400': '#7886d7',
                    '300': '#b2b7ff',
                    '100': '#e6e8ff',
                },
                "main": "#A9D0D0",
                "main-dark": "#97C6CA",
                "main-white": "#FAFAFA",
                "light": "#EEEEEE",
                "primary": "#F24A16",
                "secondary": "#f6eeeb",
                "text": "#052625",
                "success": "#006C4E",
                "warning": "#E5A011",
                "info": "#2196F3",
                "danger": "#CA1F1F",
                "light-success": "#DDFFDD",
                "light-warning": "#FFECA3",
                "light-info": "#DDFFFF",
                "light-danger": "#FFDDDD",
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
