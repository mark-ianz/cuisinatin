import {SIDEBAR_CLOSE_BUTTON_ELEMENT,
        SIDEBAR_SEARCH_BUTTON_ELEMENT,
        RESPONSIVE_SEARCH_IMAGE,
        sidebarModalElement,
        menuElement,
        toggleSidebar,
        SIDEBAR_SEARCH_BAR_ELEMENT,
        SEARCH_BAR_ELEMENT,
} from "../nav-bar.js";

/* SIDEBAR FUNCTION */
SIDEBAR_CLOSE_BUTTON_ELEMENT.addEventListener ('click', toggleSidebar);
SIDEBAR_SEARCH_BUTTON_ELEMENT.addEventListener ('click', toggleSidebar);
RESPONSIVE_SEARCH_IMAGE.addEventListener ('click', toggleSidebar);
sidebarModalElement.addEventListener ('click', toggleSidebar);
menuElement.addEventListener ('click', toggleSidebar);

SEARCH_BAR_ELEMENT.addEventListener ('keyup', (event) => {
  if (event.key === 'Enter') {
    SEARCH_BAR_ELEMENT.value = '';
  };
});
SIDEBAR_SEARCH_BAR_ELEMENT.addEventListener ('keyup', (event) => {
  if (event.key === 'Enter') {
    SIDEBAR_SEARCH_BAR_ELEMENT.value = '';
    toggleSidebar ();
  };
});