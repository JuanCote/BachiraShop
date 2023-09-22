const passwordInput = document.getElementById('reg-password-input');
const showPasswordButton = document.getElementById('reg-show-password-button');
const showPasswordButtonShow = document.getElementById('reg-show-password-button-show');
const emailInput = document.getElementById('reg-email-input');
const invalidEmail = document.getElementById('error-email')

emailInput.addEventListener('keydown', function(event) {
    const key = event.key
    if (key === ' '){
        event.preventDefault()
    }
})

passwordInput.addEventListener('keydown', function(event) {
    const key = event.key
    if (key === ' '){
        event.preventDefault()
    }
})

function togglePasswordVisibility() {
  if (passwordInput.type === 'password') {
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


let phoneInput = document.getElementById('phone-input');
const invalidPhone = document.getElementById('error-phone')

phoneInput.value = '+38 ';

phoneInput.addEventListener('input', function () {
  let value = phoneInput.value.replace(/\D/g, '');
  let formattedValue = formatPhoneNumber(value);
  phoneInput.value = formattedValue;
});

phoneInput.addEventListener('keydown', function (event) {
    if (event.key === 'Backspace' && phoneInput.value === '+38') {
      event.preventDefault();
    }
  });

phoneInput.addEventListener('input', function () {
    let phone = phoneInput.value;
    if (phone.length == 19) {
        invalidPhone.classList.add('hidden')
        phoneInput.classList.add('border-green-500');
        phoneInput.classList.add('border-2');
        phoneInput.classList.remove('border-red-500');
    } else {
        phoneInput.classList.remove('border-green-500');
        phoneInput.classList.add('border-red-500');
        phoneInput.classList.add('border-2');
    }
  });

function formatPhoneNumber(value) {
    let formattedValue = '';
    if (value.length >= 1) {
      formattedValue = '+' + value.substring(0, 2);
    }
    if (value.length < 2) {
        formattedValue += '+38'
      }
    if (value.length >= 3) {
      formattedValue += ' (' + value.substring(2, 5);
    }
    if (value.length >= 6) {
      formattedValue += ') ' + value.substring(5, 8);
    }
    if (value.length >= 9) {
      formattedValue += '-' + value.substring(8, 10);
    }
    if (value.length >= 11) {
      formattedValue += '-' + value.substring(10, 12);
    }
    return formattedValue;
  }

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

const invalidPassword = document.getElementById('error-password')

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

function validatePassword() {
    const password = passwordInput.value;
    const pattern = /^[A-Za-z0-9_]{8,}$/;
    if (pattern.test(password)) {
        return true
    }
}

passwordInput.addEventListener('input', validatePasswordForm);

const form = document.querySelector('form');

form.addEventListener('submit', function(event) {
    const email = emailInput.value;
    const password = passwordInput.value;
    const phone = phoneInput.value;

    let flag = true

    if (!validateEmail(email)){
        invalidEmail.classList.remove('hidden')
        flag = false
    }

    if (!validatePassword(password)){
        invalidPassword.classList.remove('hidden')
        flag = false
    }

    if (phone.length !== 19){
        invalidPhone.classList.remove('hidden')
        flag = false
    }

    if (!flag){
        event.preventDefault();
    }
});
