// Validation using JustValidate library
if (document.getElementById('form_register')) {
  const register_validation = new JustValidate('#form_register');
  register_validation
    .addField('#first_name', [
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
    .addField('#last_name', [
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
    .addField('#repeat_password', [
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
    ]);
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