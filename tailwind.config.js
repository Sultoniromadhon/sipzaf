module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
  ],
  theme: {
      extend: {
        backgroundImage: {
        // 'bg_login': "url('./public/image/bg.jpg')",
      }
    },
  },
    plugins: [
      require('@tailwindcss/forms'),
  ],
}
