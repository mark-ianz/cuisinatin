export const sidebarElement = document.querySelector ('.sidebar-container');
export const menuElement = document.querySelector ('.hamburger-menu-container');
export const sidebarModalElement = document.querySelector ('.modal-background');
export const RESPONSIVE_SEARCH_IMAGE = document.querySelector ('.responsive-search-image');
export const SIDEBAR_CLOSE_BUTTON_ELEMENT = document.querySelector ('.sidebar-close-button-container');
export const SIDEBAR_SEARCH_BUTTON_ELEMENT = document.querySelector ('.sidebar-search-button');

export function toggleSidebar () {
  if (sidebarElement.classList.contains ('sidebar-slide')) {
    sidebarElement.classList.add ('sidebar-hide');
    sidebarModalElement.style.display = 'none';
  }
  else {
    sidebarElement.classList.add ('sidebar-slide');
    sidebarElement.classList.remove ('sidebar-hide');
    sidebarModalElement.style.display = 'block';
  }
  setTimeout (checkSidebar, 500);
};

function checkSidebar () {
  if (sidebarElement.matches (".sidebar-slide.sidebar-hide") ) {
    sidebarElement.classList.remove ('sidebar-slide');
    sidebarElement.classList.remove ('sidebar-hide');
  }
};