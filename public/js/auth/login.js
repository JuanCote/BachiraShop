const emailInput = document.getElementById('log-email-input');
const passwordInput = document.getElementById('log-password-input');
const showPasswordButton = document.getElementById('log-show-password-button');
const showPasswordButtonShow = document.getElementById('log-show-password-button-show');
const invalidPassword = document.getElementById('error-password')
const invalidEmail = document.getElementById('error-email')



emailInput.addEventListener('input', function () {
  let email = emailInput.value;

  if (validateEmail(email)) {
    invalidEmail.classList.add('hidden')
    emailInput.classList.add('border-green-500');
    emailInput.classList.add('border-2');
    emailInput.classList.remove('border-red-500');
  } else {
    emailInput.classList.remove('border-green-500');
    emailInput.classList.add('border-red-500');
    emailInput.classList.add('border-2');
  }
});

function validateEmail(email) {
  const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  return emailPattern.test(email);
}


function togglePasswordVisibility() {
    if (passwordInput.type === 'password') {
        invalidPassword.classList.add('hidden')
        showPasswordButtonShow.classList.remove('opacity-0')
        showPasswordButton.classList.add('opacity-0')
        passwordInput.type = 'text';
    } else {
        showPasswordButtonShow.classList.add('opacity-0')
        showPasswordButton.classList.remove('opacity-0')
        passwordInput.type = 'password';
    }
  }

showPasswordButton.addEventListener('click', function() {
  togglePasswordVisibility();
});

function validatePasswordForm() {
    const password = passwordInput.value;
    const pattern = /^[A-Za-z0-9_]{8,}$/;


    if (pattern.test(password)) {
        invalidPassword.classList.add('hidden')
        passwordInput.classList.add('border-green-500');
        passwordInput.classList.add('border-2');
        passwordInput.classList.remove('border-red-500');
    } else {
        passwordInput.classList.remove('border-green-500');
        passwordInput.classList.add('border-red-500');
        passwordInput.classList.add('border-2');
    }
}

passwordInput.addEventListener('input', validatePasswordForm);

function validatePassword() {
    const password = passwordInput.value;
    const pattern = /^[A-Za-z0-9_]{8,}$/;
    if (pattern.test(password)) {
        return true
    }
}

const form = document.querySelector('form');

form.addEventListener('submit', function(event) {
    const email = emailInput.value
    const password = passwordInput.value

    let flag = true

    if (!validateEmail(email)){
        invalidEmail.classList.remove('hidden')
        flag = false
    }

    if (!validatePassword(password)){
        invalidPassword.classList.remove('hidden')
        flag = false
    }

    if (!flag){
        event.preventDefault();
    }
});
