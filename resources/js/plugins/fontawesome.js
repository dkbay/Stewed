import Vue from 'vue'
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

// import { } from '@fortawesome/free-regular-svg-icons'

import {
  faUser, faLock, faSignOutAlt, faCog
} from '@fortawesome/free-solid-svg-icons'

import {
  faGithub,
  faFacebook,
  faGoogle
} from '@fortawesome/free-brands-svg-icons'

library.add(
  faUser, faLock, faSignOutAlt, faCog, faGithub, faFacebook, faGoogle
)

Vue.component('fa', FontAwesomeIcon)
