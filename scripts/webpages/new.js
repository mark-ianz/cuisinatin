import { cuisines } from "../../data/cuisines.js";

let newArr = [];
let cuisineTimeDate = [];

/* WILL CONCATINATE THE DATE POSTED AND TIME POSTED AND PUSH IT TO ARRAY */
cuisines.forEach ((cuisine) => {
  cuisineTimeDate.push (cuisine.datePosted + ' ' + cuisine.timePosted);
});

/* WILL SORT THE ARRAY OF DATES */
cuisineTimeDate.sort ((a,b)=> {
  let date1 = new Date (a);
  let date2 = new Date (b);

  if (date1<date2) {
    return 1
  }
  else {
    return -1
  };
});

/* WILL PUSH THE CUISINE INTO NEWARR IF IT MATCHES THE DATE AND TIME */
cuisineTimeDate.forEach ((timeDate) => {
  cuisines.forEach ((cuisine) => {
    if (cuisine.datePosted + ' ' + cuisine.timePosted === timeDate) {
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
