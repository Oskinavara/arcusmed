import Vue from 'vue'
import * as VueGoogleMaps from 'vue2-google-maps'
Vue.use(VueGoogleMaps, {
  load: {
    key: 'AIzaSyD6O2eE7na9UokrHZsgxmnlttQKzXyTiYM',
    libraries: 'places', // This is required if you use the Autocomplete plugin
  },
})
