/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{html,js,css}",
    "./*.{php,css}"
  ],
  theme: {
    extend: {
      colors: {
        "primary-color": "var(--primary-color)",
        "primary-color-hover": "var(--primary-color-hover)",
        "secondary-color": "var(--secondary-color)",
        "secondary-color-hover": "var(--secondary-color-hover)"
      },
    },
  },
  plugins: [],
}