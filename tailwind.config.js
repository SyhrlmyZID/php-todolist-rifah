 /** @type {import('tailwindcss').Config} */
 export default {
  content: ["*.{html,js,php}", "pengguna/*.{html,js,php}", "admin/*.{html,js,php}"],
  theme: {
    extend: {
      colors: {
        primary: '#ffb4a2',
        'primary-dark': '#ff9a80',
      },
      fontFamily: {
        poppins: ['Poppins', 'sans-serif'],
      },
    }
  },
  plugins: [],
}