module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue"
  ],
  theme: {
    fontFamily: {
      'sans': ['"Nunito Sans"', 'sans-serif'],
      'display': ['"Nunito Sans"', 'serif']
    },
    extend: {
      colors: {
        'scout-purple': '#7413dc',
      }
    }
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
