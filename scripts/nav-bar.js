const sidebarElement = document.querySelector ('.sidebar-container');
const menuElement = document.querySelector ('.hamburger-menu-container');
const closeImage = document.querySelector('.sidebar-close-button-container');
const sidebarModalElement = document.querySelector ('.modal-background');
const RESPONSIVE_SEARCH_IMAGE = document.querySelector ('.responsive-search-image');
const SIDEBAR_CLOSE_BUTTON_ELEMENT = document.querySelector ('.sidebar-close-button-container');
const SIDEBAR_SEARCH_BUTTON_ELEMENT = document.querySelector ('.sidebar-search-button');

SIDEBAR_CLOSE_BUTTON_ELEMENT.addEventListener ('click', toggleSidebar);
SIDEBAR_SEARCH_BUTTON_ELEMENT.addEventListener ('click', toggleSidebar);
RESPONSIVE_SEARCH_IMAGE.addEventListener ('click', toggleSidebar);
sidebarModalElement.addEventListener ('click', toggleSidebar);
menuElement.addEventListener ('click', toggleSidebar);

function toggleSidebar () {
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
}

function checkSidebar () {
  if (sidebarElement.matches (".sidebar-slide.sidebar-hide") ) {
    sidebarElement.classList.remove ('sidebar-slide');
    sidebarElement.classList.remove ('sidebar-hide');
  }
};