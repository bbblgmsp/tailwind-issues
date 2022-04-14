// tailwind.config.js
module.exports = {
  theme: {
    screens: {
      'sm': '0px',
      // => @media (min-width: 0px) { ... }

      'md': '550px',
      // => @media (min-width: 550px) { ... }

      'lg': '1024px',
      // => @media (min-width: 1024px) { ... }

      'xl': '1280px',
      // => @media (min-width: 1280px) { ... }

      '2xl': '1536px',
      // => @media (min-width: 1536px) { ... }
    }
  }
}

module.exports = {
  // purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        'cc1': '#012347', // synapse blue
        'cc2': '#00FF91', // synapse green
        'cc3': '#1e87f0', // ruddy blue
        'cc4': '#fef8d3', // cream yellow
        'ccborder': '#00FF91', // white
        'cctopnavback': '#012347', // white
        'cctopnavitems': 'white', // ruddy blue
        'cctopnavactive': '#00FF91', // ultramarine blue
        'cctopnavhover': '#00FF91', // ultramarine blue
        'cctopnavactivehover': '#00FF91', // ultramarine blue
        'ccfootnavback': '#012347', // ultramarine blue
        'ccfootnavitems': 'white', // white
        'ccfootnavactive': '#00FF91', // baby blue
        'ccfootnavhover': '#00FF91', // baby blue
        'ccfootnavactivehover': '#00FF91', // baby blue
      },
      fontFamily: {
       'cf-bold': ['Consolas-Bold', 'sans-serif'],
       'cf-regular': ['Consolas', 'sans-serif'],
      },
      ringColor: ['hover', 'active'],
    },
  },
  variants: {},
  content: ['../**/*.{php,js}', './node_modules/tw-elements/dist/js/**/*.js'],
  plugins: [
    require('tw-elements/dist/plugin'),
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/custom-forms'),
  ]
}