export default {
  // Target: https://go.nuxtjs.dev/config-target
  target: 'static',
  server: {
    host: '0.0.0.0', // default: localhost
  },

  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: 'ARCUS-MED: Nowoczesne gabinety stomatologiczne i lekarskie',
    htmlAttrs: {
      lang: 'en',
    },
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      {
        hid: 'description',
        name: 'description',
        content:
          'Przychodnia Arcus-Med w Częstochowie. Medycyna oparta na faktach - Evidence Based Medicine Poradnia lekarska i gabinety stomatologicznę. Umów wizytę.',
      },
      { name: 'format-detection', content: 'telephone=no' },
    ],
    link: [{ rel: 'icon', type: 'image/png', href: '/favicon.png' }],
  },

  googleFonts: {
    families: {
      'Fira+Sans+Condensed': {
        wght: [400],
      },
      Poppins: {
        wght: [200, 300, 400, 600],
      },
    },
  },

  // Global CSS: https://go.nuxtjs.dev/config-css

  ssr: true,

  image: {
    // Options
  },

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: ['./plugins/map.client.js', './plugins/click-outside.js'],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: ['@nuxtjs/robots'],

  robots: {
    UserAgent: '*',
    Allow: '/'
  },

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: { transpile: [/^vue2-google-maps($|\/)/] },

  buildModules: ['@nuxtjs/style-resources', '@nuxtjs/google-fonts'],

  styleResources: {
    scss: ['./styles/index.scss'],
  },
}
