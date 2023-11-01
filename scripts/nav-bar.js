import { cuisines } from "../data/cuisines.js";

export const sidebarElement = document.querySelector ('.sidebar-container');
export const menuElement = document.querySelector ('.hamburger-menu-container');
export const sidebarModalElement = document.querySelector ('.modal-background');
export const RESPONSIVE_SEARCH_IMAGE = document.querySelector ('.responsive-search-image');
export const SIDEBAR_CLOSE_BUTTON_ELEMENT = document.querySelector ('.sidebar-close-button-container');
export const SIDEBAR_SEARCH_BUTTON_ELEMENT = document.querySelector ('.sidebar-search-button');
const FEED_LIST_CONTAINER = document.querySelector ('.feed-list');

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

/* SEARCH */
export const SEARCH_BAR_ELEMENT = document.querySelector ('.search-bar');
export const SIDEBAR_SEARCH_BAR_ELEMENT = document.querySelector ('.sidebar-search-bar');
export const SEARCH_BUTTON_ELEMENT = document.querySelector ('.search-button');


let searchArr = [];

function generateSearch () {
  searchArr.forEach ((cuisine) => {
    const html = 
      `
        <div class="post-container">
          <div class="image-container">
              <a href="${cuisine.cuisineLink}">
                  <img src="${cuisine.cuisineImage}">
              </a>
          </div>
          <div class="description-container">
              <a href="${cuisine.cuisineLink}">
                  <div class="food-info">
                      <p class="food-name">
                        ${cuisine.cuisineName}
                      </p>
                      <div class="flex-row">
                          <div class="rating-container">
                              <img src="/images/ratings/rating-${(cuisine.rating * 10)}.png" class="rating">
                          </div>
                          <p class="rating-counter">(${cuisine.ratingCount})</p>
                      </div>
                  </div>
              </a>
              <div class="author-info">
                  <div class="flex-row">
                      <a href="${cuisine.authorProfileLink}">
                          <img src="${cuisine.authorProfilePicture}" class="author-picture">
                      </a>
                      <div>
                          <a href="${cuisine.authorProfileLink}">
                              Author: ${cuisine.author}
                          </a>
                          <p>
                              ${cuisine.datePosted}
                          </p>
                      </div>
                  </div>
                  <div class="flex-row">
                      <button class="like-button">
                          <img src="/images/heart-regular.svg" class="like-image">
                      </button>
                      <p class="like-counter">
                          (${cuisine.likes})
                      </p>
                  </div>
              </div>
          </div>
        </div>
      `;
    FEED_LIST_CONTAINER.innerHTML += html
  });
}

/* DEFAULT SEARCH */
export function search () {
  const input = SEARCH_BAR_ELEMENT.value.toLowerCase();
  searchArr = [];
  cuisines.forEach ((cuisine) => {
    const lowerCuisineName = cuisine.cuisineName.toLowerCase ();
    if (lowerCuisineName.includes (input) && lowerCuisineName !== '') {
      searchArr.push (cuisine);
    }
    FEED_LIST_CONTAINER.innerHTML = '';
    generateSearch ();
  });
};


/* SIDEBAR SEARCH */
export function sidebarSearch () {
  const input = SIDEBAR_SEARCH_BAR_ELEMENT.value.toLowerCase();
  searchArr = [];
  cuisines.forEach ((cuisine) => {
    const lowerCuisineName = cuisine.cuisineName.toLowerCase ();
    if (lowerCuisineName.includes (input) && lowerCuisineName !== '') {
      searchArr.push (cuisine);
    }
    FEED_LIST_CONTAINER.innerHTML = '';
    generateSearch ();
  });
};
