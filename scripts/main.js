import {toggleSidebar,
        SIDEBAR_CLOSE_BUTTON_ELEMENT,
        SIDEBAR_SEARCH_BUTTON_ELEMENT,
        RESPONSIVE_SEARCH_IMAGE,
        sidebarModalElement,
        menuElement } from "./main.js";

SIDEBAR_CLOSE_BUTTON_ELEMENT.addEventListener ('click', toggleSidebar);
SIDEBAR_SEARCH_BUTTON_ELEMENT.addEventListener ('click', toggleSidebar);
RESPONSIVE_SEARCH_IMAGE.addEventListener ('click', toggleSidebar);
sidebarModalElement.addEventListener ('click', toggleSidebar);
menuElement.addEventListener ('click', toggleSidebar);