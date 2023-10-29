import { cuisines } from "../data/cuisines.js";

let newArr = [];
let cuisineDates = [];
let cuisineID = [];

/* WILL PUSH THE CUISINE DATES AND ID INTO NEW ARRAY */
cuisines.forEach ((cuisine) => {
  cuisineDates.push (cuisine.datePosted);
  cuisineID.push (cuisine.cuisineID);
});

/* WILL SORT THE ARRAY OF DATES */
cuisineDates.sort ((a,b)=> {
  let date1 = new Date (a);
  let date2 = new Date (b);

  if (date1<date2) {
    return 1
  }
  else {
    return -1
  };
});

/* WILL PUSH THE CUISINE INTO NEWARR IF IT MATCHES THE DATE AND ID */
cuisineDates.forEach ((date) => {
  cuisineID.forEach ((cuisineID) => {
    cuisines.forEach ((cuisine) => {
      if (cuisine.datePosted === date && cuisine.cuisineID === cuisineID) {
        newArr.push (cuisine);
      };
    });
  });
});

/* WILL GENERATE THE FEED */
const FEED_LIST_CONTAINER = document.querySelector ('.feed-list');

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

console.log (newArr)