// Import polyfills for older browsers
import './_polyfills'
// Support async/await
import 'regenerator-runtime/runtime'

// Import everything from autoload
import './autoload/_lazy-load'

// Styles
import './../styles/main.css'

// import local dependencies
import Detection from './util/Detection'
import Router from './util/Router'
import common from './routes/common'
import home from './routes/home'

// Detect browser supports
// which adds special css class to body
window._detect = new Detection({ detect: ['ie11', 'edge']})
window._detect.init()

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  // aboutUs,
})

// Load Events
jQuery(document).ready(() => routes.loadEvents())

// Enable Hot-module-replacement
if (module && module.hot) {
  module.hot.accept()
}
