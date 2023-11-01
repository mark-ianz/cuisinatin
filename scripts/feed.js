import { cuisines } from "../data/cuisines.js";

/* BEST SECTION WILL SORT THE FEED BY TOTAL LIKES AND RATINGS */

/* WILL SORT THE RATING COUNT */
let newArr = [];
let totalRatingAndLikes = []
cuisines.forEach ((cuisine) => {
  totalRatingAndLikes.push (cuisine.ratingCount + cuisine.likes);
  totalRatingAndLikes.sort ((a, b) => {return b - a  });
});

/* WILL PUSH TO NEW ARRAY IF IT MATCHES THE RATING COUNT */
totalRatingAndLikes.forEach ((total) => {
  cuisines.forEach ((cuisine) => {
    if (cuisine.ratingCount + cuisine.likes === total) {
      newArr.push (cuisine);
    };
  });
});

/* WILL GENERATE THE FEED */
const FEED_LIST_CONTAINER = document.querySelector ('.feed-list');
function generateFeed () {
  newArr.forEach ((cuisine) => {
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
generateFeed ();

/* SEARCH */
const SEARCH_BAR_ELEMENT = document.querySelector ('.search-bar');
const SEARCH_BUTTON_ELEMENT = document.querySelector ('.search-button');
SEARCH_BUTTON_ELEMENT.addEventListener ('click', search);

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

function search () {
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

SEARCH_BAR_ELEMENT.addEventListener ('keyup', (event) => {
  search ();
  if (event.key === 'Backspace' && SEARCH_BAR_ELEMENT.value === '') {
    generateFeed ();
  }
});

SEARCH_BUTTON_ELEMENT.addEventListener ('click', search);