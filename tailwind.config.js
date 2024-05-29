/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        'primary': '#4E6441',
        'secondary': '#6C8959'
      },
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

