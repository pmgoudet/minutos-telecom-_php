const editBtn = document.querySelector('#edit-admin');
const anullerBtn = document.querySelector('#reset-edit-admin');


editBtn.addEventListener('click', (e) => {
  e.preventDefault();

  const inputs = document.querySelectorAll('.form-input');

  inputs.forEach((input) => {
    input.removeAttribute('disabled');
  });

  inputs[0].focus();
})

anullerBtn.addEventListener('click', (e) => {
  e.preventDefault();

  const inputs = document.querySelectorAll('.form-input');
  const form = document.querySelector('.connect-form');

  inputs.forEach((input) => {
    input.setAttribute('disabled', '');
  });

  form.reset();
})