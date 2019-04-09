// This file updates the review editing form in the modal depending on chosen review

// Variables for the chosen review
let currentRating;
let currentContent;

// Edit review form in modal (constant)
const form = document.getElementById('edit-review-form');

// Inputs of the form element
const formInputs = form.elements;

// Click handler, triggered by the edit button on reviews
const handleClick = (id) => {

  // Set the forms action id
  form.setAttribute('action', `/reviews/${id}`);

  // Set the preselected review content
  currentContent = document.querySelector(`#review-container-${id} > .review-content`).textContent;
  document.querySelector(`#edit-review-form > input[name="content"]`).setAttribute('value', currentContent);

  // Set the preselected review rating
  currentRating = document.querySelector(`#review-container-${id} > .review-rating`).textContent;
  document.querySelector(`#edit-review-form > select > option[value="${currentRating}"]`).setAttribute('selected', currentRating);
}
