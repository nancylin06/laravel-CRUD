/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        extend: {
            fontFamily: {
                'poppins': ['Poppins', 'sans-serif']
            }
        },
    },
  plugins: [],
}
