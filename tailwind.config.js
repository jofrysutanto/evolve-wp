module.exports = {
  purge: [
    'src/**/*.php',
    'resources/**/*.html',
    'resources/**/*.js',
    'resources/**/*.jsx',
    'resources/**/*.ts',
    'resources/**/*.tsx',
    'resources/**/*.php',
    'resources/**/*.vue',
  ],
  future: {
    removeDeprecatedGapUtilities: true,
  },
  theme: {
    extend: {},
  },
  variants: {},
  plugins: [],
}
