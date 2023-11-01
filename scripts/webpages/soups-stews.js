import { cuisines } from "../../data/cuisines.js";

const FEED_LIST_CONTAINER = document.querySelector ('.feed-list');

cuisines.forEach ((cuisine) => {
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
  if (cuisine.cuisineCategory === 'Filipino Soups and Stews') {
    FEED_LIST_CONTAINER.innerHTML += html
  };
});