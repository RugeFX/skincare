/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        container: {
            center: true,
        },
        extend: {
            fontFamily: {
                'lato': ['Lato', 'sans-serif'],
            },
            backgroundImage: {
                'mesh': "url('/public/assets/background-mesh-2.png')",
                'mesh1': "url('/public/assets/background-mesh.png')",
            },
            colors: {
                linen: '#FFF2E5',
                melon: '#FFC4BE',
                blossom: '#EFB1BD',
                'light-coral': '#E08B83',
                emerald: '#00BF66',
            }
        },
    },
    plugins: [],
}
