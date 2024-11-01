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
                    50: "#F4F0FF",
                    100: "#EDE5FF",
                    200: "#D8C7FF",
                    300: "#C6ADFF",
                    400: "#B08FFF",
                    500: "#9F75FF",
                    600: "#6929FF",
                    700: "#4300E0",
                    800: "#2C0094",
                    900: "#17004D",
                    950: "#0B0024"
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
