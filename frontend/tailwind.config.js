/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{vue,ts}",
  ],
  theme: {
    extend: {
      fontFamily:{
        roboto: ["Roboto", "sans-serif"]
      }
    },
  },
  plugins: [],
}