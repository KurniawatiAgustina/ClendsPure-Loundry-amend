module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js"
    ],
    theme: {
      extend: {
        colors: {
          primary: {
            50: '#eff6ff',
            100: '#dbeafe',
            200: '#bfdbfe',
            300: '#93c5fd',
            400: '#60a5fa',
            500: '#3b82f6',
            600: '#2563eb',
            700: '#1d4ed8',
            800: '#1e40af',
            900: '#1e3a8a',
            950: '#172554',
          },
          customprimary: {
            50: "#fff8e1",
            100: "#ffedb5",
            200: "#ffe285",
            300: "#ffd756",
            400: "#ffcc29",
            500: "#ffaa00",
            600: "#ff9000",
            700: "#d97700",
            800: "#b35d00",
            900: "#8a4800",
            950: "#6e3b00",
        },
      },
      },
    },
    plugins: [
        require('flowbite/plugin')
    ],
  }

