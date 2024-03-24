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
        'primary': '#0B8C07',
        'secondary': '#19A603'
      },
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

