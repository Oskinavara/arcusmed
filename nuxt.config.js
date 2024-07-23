export default {
  // Target: https://go.nuxtjs.dev/config-target
  target: 'static',
  // server: {
  //   host: '0.0.0.0', // default: localhost
  // },
  sitemap: {
    hostname: 'https://arcusmed.pl',
    gzip: true,
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
    script: [
      {
        hid: 'gtm-script1',
        src: 'https://www.googletagmanager.com/gtag/js?id=UA-111111111-1',
        defer: true,
      },
      {
        hid: 'gtm-script2',
        innerHtml: `window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-16483909822');`,
        type: 'text/javascript',
        charset: 'utf-8',
      },
      {
        src: './mydr.js',
        type: 'text/javascript',
        body: true
      },
    ],
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
  modules: ['@nuxtjs/robots', '@nuxtjs/sitemap', '@nuxtjs/proxy'],

  robots: {
    UserAgent: '*',
    Allow: '/',
  },

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: { transpile: [/^vue2-google-maps($|\/)/] },

  buildModules: ['@nuxtjs/style-resources', '@nuxtjs/google-fonts'],

  styleResources: {
    scss: ['./styles/index.scss'],
  },

  /**
   * SmartDental online appointments booking module.
   *
   * Proxy requests for SmartDental PHP files through local PHP dev server on port 8000.
   */
  proxy: {
    '/rejestracja-online/include': {
      target: 'http://localhost:8000',
      pathRewrite: {
        '^/rejestracja-online/include': '/rejestracja-online/include',
      },
      changeOrigin: true,
    },
    '/rejestracja-online/views': {
      target: 'http://localhost:8000',
      pathRewrite: {
        '^/rejestracja-online/views': '/rejestracja-online/views',
      },
      changeOrigin: true,
    },
    '/rejestracja-online/PHPMailer': {
      target: 'http://localhost:8000',
      pathRewrite: {
        '^/rejestracja-online/PHPMailer': '/rejestracja-online/PHPMailer',
      },
      changeOrigin: true,
    },
    // Catch-all rule for other requests in /rejestracja-online
    '/rejestracja-online/': {
      target: 'http://localhost:8000',
      pathRewrite: { '^/rejestracja-online/': '/rejestracja-online/' },
      changeOrigin: true,
    },
  },

  serverMiddleware: [
    { path: '/rejestracja-online', handler: '~/serverMiddleware/proxy.js' },
  ],

  // Exclude SmartDental PHP online booking page from Nuxt route generation
  generate: {
    exclude: [/^\/rejestracja-online/],
  },
}
