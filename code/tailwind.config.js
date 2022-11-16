/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{html,js,php}", "./include/*.{html,js,php}"],
  theme: {
    container: {
      padding: '2rem',
    },
    fontFamily: {
      'RockStars': ['Rock Salt, cursive'],
      'PoorStory': ['Poor Story, cursive'],
      'Poppins': ['Poppins, sans-serif'],
    },
    // screens: {
    //   sm: '480px',
    //   md: '768px',
    //   // lg: '976px',
    //   lg: '1200px',
    //   xl: '1440px'
    // },
    extend: {
      colors: {
        gold: '#e3b04b',
        lightGold: '#ffcd69',
        transparentBlack: '#00000066',
      }
    },
  },
  plugins: [
    require('tailwindcss-textshadow')
  ],
}
