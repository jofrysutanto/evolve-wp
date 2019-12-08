// Using Font Awesome API to control icons
// @see https://fontawesome.com/how-to-use/with-the-api/setup/getting-started

// For additional import, see link below
// @see https://fontawesome.com/how-to-use/with-the-api/setup/importing-icons
import { dom, library } from '@fortawesome/fontawesome-svg-core'

// To allow tree-shaking, we only import icons that we actually use in
// the project, thus reducing the file size of the icons
import { faWordpressSimple } from '@fortawesome/free-brands-svg-icons'
import {
    faSearch,
} from '@fortawesome/pro-light-svg-icons'

// Use these icons as you normally would in html
// e.g. <i class="fab fa-wordpress-simple"></i>
library.add(
    faWordpressSimple,
    faSearch
);

// Initialise the SVG replacement
dom.i2svg()
// Observe DOM changes
dom.watch()
