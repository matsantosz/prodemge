import { initializeHybridly } from 'virtual:hybridly/config'
import { createHead } from '@unhead/vue'

import 'vuetify/styles'
import '@mdi/font/css/materialdesignicons.css'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import { aliases, mdi } from 'vuetify/iconsets/mdi'

initializeHybridly({
  enhanceVue: (vue) => {
    const head = createHead()
    head.push({
      titleTemplate: (title) => (title ? `${title} — PRODEMGE` : 'PRODEMGE'),
    })
    vue.use(head)

    const vuetify = createVuetify({
      components,
      directives,
      icons: {
        defaultSet: 'mdi',
        aliases,
        sets: {
          mdi,
        },
      },
    })
    vue.use(vuetify)
  },
})
