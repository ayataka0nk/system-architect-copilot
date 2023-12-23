/** @type {import('tailwindcss').Config} */
export default {
  content: ['./resources/**/*.blade.php', './resources/**/*.js'],
  theme: {
    extend: {
      colors: {
        primary: '#335ca8',
        'on-primary': '#ffffff',
        'primary-container': '#d8e2ff',
        'on-primary-container': '#001a42',
        secondary: '#90427a',
        'on-secondary': '#ffffff',
        'secondary-container': '#ffd8ee',
        'on-secondary-container': '#3b0030',
        tertiary: '#6750a4',
        'on-tertiary': '#ffffff',
        'tertiary-container': '#e9ddff',
        'on-tertiary-container': '#22005d',
        error: '#ba1a1a',
        'on-error': '#ffffff',
        'error-container': '#ffdad6',
        'on-error-container': '#410002',
        background: '#ffffff',
        'on-background': '#1b1b1f',
        surface: 'rgba(245, 250, 255, 1)',
        'surface-container-lowest': '#ffffff',
        'surface-container-low': '#ebf5ff',
        'surface-container': '#e0f0ff',
        'surface-container-high': '#e0f0ff',
        'surface-container-highest': '#cce6ff',
        'on-surface': '#1b1b1f',
        'on-surface-variant': '#44474f',
        outline: '#75777f',
      },
      opacity: {
        8: '0.08',
        38: '0.38',
      },
      scale: {
        1000: '10',
      },
      backgroundImage: {
        'ripple-white': 'radial-gradient(circle, #fff 10%, transparent 10.01%)',
        'ripple-primary':
          'radial-gradient(circle, #335ca8 10%, transparent 10.01%)',
        'ripple-secondary':
          'radial-gradient(circle, #90427a 10%, transparent 10.01%)',
        'ripple-tertiary':
          'radial-gradient(circle, #6750a4 10%, transparent 10.01%)',
        'ripple-surface-variant':
          'radial-gradient(circle, #44474f 10%, transparent 10.01%)',
      },
      inset: {
        13: '3.25rem',
      },
      padding: {
        13: '3.25rem',
      },
      boxShadow: {
        'underline-thin': '0 1px 0 0 black',
        'underline-thick': '0 2px 0 0 black',
      },
    },
  },
  plugins: [],
}
