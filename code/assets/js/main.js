// Validation using JustValidate library
if (document.getElementById('form_register')) {
  const register_validation = new JustValidate('#form_register');
  register_validation
    .addField('#first-name', [
      {
        rule: 'required',
        errorMessage: 'First name is required',
      },
      {
        rule: 'minLength',
        value: 3,
      },
      {
        rule: 'maxLength',
        value: 30,
      },
    ])
    .addField('#last-name', [
      {
        rule: 'required',
        errorMessage: 'Last name is required',
      },
      {
        rule: 'minLength',
        value: 3,
      },
      {
        rule: 'maxLength',
        value: 30,
      },
    ])
    .addField('#email', [
      {
        rule: 'required',
        errorMessage: 'Email is required',
      },
      {
        rule: 'email',
        errorMessage: 'Email is invalid!',
      },
    ])
    .addField('#password', [
      {
        rule: 'required',
        errorMessage: 'Password is required',
      },
      {
        rule: 'password',
      },
    ])
    .addField('#repeat-password', [
      {
        rule: 'required',
        errorMessage: 'Repeat Password is required',
      },
      {
        validator: (value, fields) => {
          if (fields['#password'] && fields['#password'].elem) {
            const repeatPasswordValue = fields['#password'].elem.value;

            return value === repeatPasswordValue;
          }
          return true;
        },
        errorMessage: 'Passwords should be the same',
      },
    ])
    .onSuccess((event) => {
      event.currentTarget.submit();
    });
}
function setType(type) {
  document.getElementById('type').setAttribute("name", type);
}

if (document.getElementById('form_login')) {
  const login_validation = new JustValidate('#form_login');

  login_validation
    .addField('#email', [
      {
        rule: 'required',
        errorMessage: 'Email is required',
      },
      {
        rule: 'email',
        errorMessage: 'Email is invalid!',
      },
    ])
    .addField('#password', [
      {
        rule: 'required',
        errorMessage: 'Password is required',
      },
      {
        rule: 'password',
      },
    ])
}
if (document.getElementById('dropdown-card')) {
  // i need to fix problem of dropdown
  let dropdown_card = $("#dropdown-card");
  $("#dropdown").click(function () {
    dropdown_card.toggle();
  });
  $(document).mouseup(function (e) {
    if (!dropdown_card.is(e.target) && dropdown_card.has(e.target).length === 0) {
      dropdown_card.hide();
    } else {
      dropdown_card.toggle();
    }
  });
}