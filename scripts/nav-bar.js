<<<<<<< HEAD
const sidebarElement = document.querySelector ('.sidebar-container');
const menuElement = document.querySelector ('.hamburger-menu-container');
const sidebarModalElement = document.querySelector ('.modal-background');
const RESPONSIVE_SEARCH_BUTTON = document.querySelectorAll ('.responsive-search-button');
const SIDEBAR_CLOSE_BUTTON_ELEMENT = document.querySelector ('.sidebar-close-button-container');
const SIDEBAR_SEARCH_BUTTON_ELEMENT = document.querySelector ('.sidebar-search-button');
const FEED_LIST_CONTAINER = document.querySelector ('.feed-list');

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
};

function checkSidebar () {
  if (sidebarElement.matches (".sidebar-slide.sidebar-hide") ) {
    sidebarElement.classList.remove ('sidebar-slide');
    sidebarElement.classList.remove ('sidebar-hide');
  }
};

menuElement.addEventListener ('click', toggleSidebar);
SIDEBAR_CLOSE_BUTTON_ELEMENT.addEventListener ('click', toggleSidebar);
sidebarModalElement.addEventListener ('click', toggleSidebar);
RESPONSIVE_SEARCH_BUTTON.forEach((button) => {
  button.addEventListener ('click', toggleSidebar);
=======
const sidebarElement = document.querySelector ('.sidebar-container');
const menuElement = document.querySelector ('.hamburger-menu-container');
const sidebarModalElement = document.querySelector ('.modal-background');
const RESPONSIVE_SEARCH_BUTTON = document.querySelectorAll ('.responsive-search-button');
const SIDEBAR_CLOSE_BUTTON_ELEMENT = document.querySelector ('.sidebar-close-button-container');
const SIDEBAR_SEARCH_BUTTON_ELEMENT = document.querySelector ('.sidebar-search-button');
const FEED_LIST_CONTAINER = document.querySelector ('.feed-list');

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
};

function checkSidebar () {
  if (sidebarElement.matches (".sidebar-slide.sidebar-hide") ) {
    sidebarElement.classList.remove ('sidebar-slide');
    sidebarElement.classList.remove ('sidebar-hide');
  }
};

menuElement.addEventListener ('click', toggleSidebar);
SIDEBAR_CLOSE_BUTTON_ELEMENT.addEventListener ('click', toggleSidebar);
sidebarModalElement.addEventListener ('click', toggleSidebar);
RESPONSIVE_SEARCH_BUTTON.forEach((button) => {
  button.addEventListener ('click', toggleSidebar);
>>>>>>> origin/main
});