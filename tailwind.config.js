/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js}"],
  theme: {
    extend: {
      fontFamily: {
        'body': ['Space Grotesk']
      },
    colors: {
        'primary': "#6EB5B0",
        'background': '#F1F8F8'
    }
    },
  },
  plugins: [],
}