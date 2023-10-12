const phoneInput = document.getElementById('phone-input');

const firstname = document.getElementById('firstname')
const firstnameCheck = document.getElementById('firstname-error-check')
const firstnameError = document.getElementById('firstname-error')

const surname = document.getElementById('surname')
const surnameCheck = document.getElementById('surname-error-check')
const surnameError = document.getElementById('surname-error')

const street = document.getElementById('street')
const streetCheck = document.getElementById('street-error-check')
const streetError = document.getElementById('street-error')

const house = document.getElementById('house')
const houseCheck = document.getElementById('house-error-check')
const houseError = document.getElementById('house-error')

const postal = document.getElementById('postal')
const postalCheck = document.getElementById('postal-error-check')
const postalError = document.getElementById('postal-error')

const city = document.getElementById('city')
const cityCheck = document.getElementById('city-error-check')
const cityError = document.getElementById('city-error')


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

firstname.addEventListener('blur', () => {
    const error = checkFirstname(firstname.value)
    if (error){
        firstnameError.innerText = error
        firstnameError.classList.remove('hidden')
        firstnameCheck.classList.add('hidden')
    }else {
        firstnameCheck.classList.remove('hidden')
        firstnameError.classList.add('hidden')
    }
})

surname.addEventListener('blur', () => {
    const error = checkFirstname(surname.value)
    if (error){
        surnameError.innerText = error
        surnameError.classList.remove('hidden')
        surnameCheck.classList.add('hidden')
    }else {
        surnameCheck.classList.remove('hidden')
        surnameError.classList.add('hidden')
    }
})

street.addEventListener('blur', () => {
    if (street.value) {
        streetCheck.classList.remove('hidden')
        streetError.classList.add('hidden')
    }else{
        streetCheck.classList.add('hidden')
        streetError.classList.remove('hidden')
    }
})

house.addEventListener('blur', () => {
    if (house.value) {
        houseCheck.classList.remove('hidden')
        houseError.classList.add('hidden')
    }else{
        houseCheck.classList.add('hidden')
        houseError.classList.remove('hidden')
    }
})

postal.addEventListener('blur', () => {
    const error = checkPostalCode(postal.value)
    if (error){
        postalError.innerText = error
        postalError.classList.remove('hidden')
        postalCheck.classList.add('hidden')
    }else {
        postalCheck.classList.remove('hidden')
        postalError.classList.add('hidden')
    }
})

city.addEventListener('blur', () => {
    if (city.value) {
        cityCheck.classList.remove('hidden')
        cityError.classList.add('hidden')
    }else{
        cityCheck.classList.add('hidden')
        cityError.classList.remove('hidden')
    }
})

function checkFirstname(firstname) {
    const nameRegex = /^[a-zA-Z]+$/;

    if (!firstname) {
        return 'This is a required field';
    }

    if (firstname.length < 3) {
        return 'Minimum 3 characters';
    }

    if (!nameRegex.test(firstname)) {
        return 'Incorrect firstname';
    }

    return '';
}

function checkSurname(surname) {
    const nameRegex = /^[a-zA-Z]+$/;

    if (!surname) {
        return 'This is a required field';
    }

    if (surname.length < 3) {
        return 'Minimum 3 characters';
    }

    if (!nameRegex.test(surname)) {
        return 'Incorrect surname';
    }

    return '';
}

function checkPostalCode(postalCode) {
    const postalCodeRegex = /^\d+$/;

    if (postalCode.length < 5) {
        return 'Minimum 5 characters';
    }

    if (postalCode.length > 5) {
        return 'Maximum 5 characters';
    }

    if (!postalCodeRegex.test(postalCode)) {
        return 'Please enter only valid characters';
    }

    return '';
}
