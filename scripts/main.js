import {toggleSidebar,
        SIDEBAR_CLOSE_BUTTON_ELEMENT,
        SIDEBAR_SEARCH_BUTTON_ELEMENT,
        RESPONSIVE_SEARCH_IMAGE,
        sidebarModalElement,
        menuElement,
        SEARCH_BAR_ELEMENT,
        SIDEBAR_SEARCH_BAR_ELEMENT,
        SEARCH_BUTTON_ELEMENT,
        search,
        sidebarSearch
      } from "./nav-bar.js";
import { generateFeed } from "./webpages/feed.js";


SIDEBAR_CLOSE_BUTTON_ELEMENT.addEventListener ('click', toggleSidebar);
SIDEBAR_SEARCH_BUTTON_ELEMENT.addEventListener ('click', toggleSidebar);
RESPONSIVE_SEARCH_IMAGE.addEventListener ('click', toggleSidebar);
sidebarModalElement.addEventListener ('click', toggleSidebar);
menuElement.addEventListener ('click', toggleSidebar);

/* SEARCH FUNCTION */
SEARCH_BUTTON_ELEMENT.addEventListener ('click', search);
SEARCH_BAR_ELEMENT.addEventListener ('keyup', (event) => {
  search ();
  if (event.key === 'Backspace' && SEARCH_BAR_ELEMENT.value === '') {
    generateFeed ();
  };
  if (event.key === 'Enter') {
    SEARCH_BAR_ELEMENT.value = '';
  };
});
SIDEBAR_SEARCH_BAR_ELEMENT.addEventListener ('keyup', (event) => {
  sidebarSearch ();
  if (event.key === 'Backspace' && SEARCH_BAR_ELEMENT.value === '') {
    generateFeed ();
  };
  if (event.key === 'Enter') {
    SIDEBAR_SEARCH_BAR_ELEMENT.value = '';
    toggleSidebar ();
  };
});