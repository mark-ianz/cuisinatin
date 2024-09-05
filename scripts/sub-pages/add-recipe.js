/* PREVENT FORM FROM SUBMITTING WHEN PRESSED ENTER KEY */
const FORM = document.querySelector ('.js-form-container');
FORM.addEventListener ('keydown', (event)=> {
  if (event.key === 'Enter') {
    event.preventDefault ();
  }
})

/* ADDING RECIPE */
const ADD_RECIPE_INPUT = document.querySelector ('.add-recipe-input');
const RECIPE_LIST_CONTAINER = document.querySelector ('.recipe-list');
const ADD_RECIPE_BUTTON = document.querySelector ('.add-recipe');
ADD_RECIPE_BUTTON.addEventListener ('click', ()=> {
  console.log (123);
})
let recipeList = [];

function addRecipe () {
  if (ADD_RECIPE_INPUT.value != '') {
    recipeList.push (ADD_RECIPE_INPUT.value);
  
    renderList ();
  
    ADD_RECIPE_INPUT.value = '';
  }
};

function renderList () {
  RECIPE_LIST_CONTAINER.innerHTML = '';
  recipeList.forEach ((value) => {
    let html =
    `
      <li>
        <input name="recipe[]" type="text" class="recipe" value="${value}">
        <input type="button" value="X" class="remove-recipe">
      </li>
    `;
    RECIPE_LIST_CONTAINER.innerHTML += html;
  });
  document.querySelectorAll ('.remove-recipe').forEach ((value,index) => {
    value.addEventListener ('click', () => {
      recipeList.splice (index, 1);
      RECIPE_LIST_CONTAINER.innerHTML = '';
      renderList ();
      if (recipeList.length === 0) {
        RECIPE_LIST_CONTAINER.innerHTML = '';
      }
    });
  });
}
ADD_RECIPE_BUTTON.addEventListener ('click', addRecipe);


/* ADDING PROCEDURE */
const ADD_PROCEDURE_INPUT = document.querySelector ('.add-procedure-input');
const PROCEDURE_LIST_CONTAINER = document.querySelector ('.procedure-list');
const ADD_PROCEDURE_BUTTON = document.querySelector ('.add-procedure');

let procedureList = [];
function addProcedure () {
  if (ADD_PROCEDURE_INPUT.value != '') {
    procedureList.push (ADD_PROCEDURE_INPUT.value);
  
    renderProcedure ();
  
    ADD_PROCEDURE_INPUT.value = '';
  }
};

function renderProcedure () {
  PROCEDURE_LIST_CONTAINER.innerHTML = '';
  procedureList.forEach ((value,index) => {
    let html =
    `
      <li>
        <label for="procedure[]">${index + 1}.</label>
        <input name="procedure[]" type="text" class="procedure" value="${value}">
        <input type="button" value="X" class="remove-procedure">
      </li>
    `;
    PROCEDURE_LIST_CONTAINER.innerHTML += html;
  });
  document.querySelectorAll ('.remove-procedure').forEach ((value,index) => {
    value.addEventListener ('click', () => {
      procedureList.splice (index, 1);
      PROCEDURE_LIST_CONTAINER.innerHTML = '';
      renderProcedure ();
      if (procedureList.length === 0) {
        PROCEDURE_LIST_CONTAINER.innerHTML = '';
      }
    });
  });
};


ADD_PROCEDURE_BUTTON.addEventListener ('click', addProcedure);

/* TO ADD RECIPE OR PROCEDURE WHEN PRESSED ENTER KEY */

ADD_RECIPE_INPUT.addEventListener ('keydown', (event)=> {
  if (event.key === 'Enter') {
    addRecipe ();
  }
});

ADD_PROCEDURE_INPUT.addEventListener ('keydown', (event)=> {
  if (event.key === 'Enter') {
    addProcedure ();
  }
})

function displayError (errorMessage) {
  const ERROR_DIV = document.querySelector ('.js-error-message');
  
  const html = `
    <p class="error-message">
      ${errorMessage}
    </p>
  `
  ERROR_DIV.innerHTML += html;
}


function displayModal () {
  const html = `
    <div class="modal-bg">
      <div class="modal-container">
        <p class="title">
          Join the Cuisinatin community
        </p>
        <p>
          Oops! It looks like you need to log in to access this feature. Please log in or create an account to continue exploring all the amazing features we have to offer.
        </p>
        <div class="option">
          <a href="./login.php">
              <button>
              LOGIN
              </button>
            </a>
          <a href="./signup.php">
            <button>
              SIGNUP
            </button>
          </a>
        </div>
      </div>
    </div>
  `
  document.body.innerHTML += html;
  removeModal ();
}

function removeModal () {
  const MODAL_ELEMENT = document.querySelector ('.modal-bg');
  const MODAL_CLOSE_BUTTON = document.querySelector ('.js-cb');

  MODAL_CLOSE_BUTTON.addEventListener ('click', ()=> {
    MODAL_ELEMENT.remove ();
  });
}
