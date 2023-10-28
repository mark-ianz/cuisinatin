const sidebarElement = document.querySelector ('.sidebar-container');
const menuElement = document.querySelector ('.hamburger-menu-container');
const closeImage = document.querySelector('.sidebar-close-button-container');
const sidebarModalElement = document.querySelector ('.modal-background');

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
}

function keyListener (event) {
  if (event.key === 'Enter') {
    location.href = "./webpages/error-page.html"
  }
}

const CLOSE_POST_BUTTON = document.querySelector ('.close-button');

CLOSE_POST_BUTTON.addEventListener ('click', history.back);