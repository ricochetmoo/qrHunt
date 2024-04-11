module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue"
  ],
  theme: {
    fontFamily: {
      'sans': ['"Aleo"', 'sans-serif'],
      'display': ['"Cabin"', 'serif']
    },
    extend: {
      colors: {
        'scout-purple': '#00A4F2',
      }
    }
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
