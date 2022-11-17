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
    .onSuccess((event) => {
      event.currentTarget.submit();
    });
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
function openModal() {
  document.getElementById("type").setAttribute("name", 'add');
  $("#update").removeClass("bloc").addClass("hidden");
  $("#delete").removeClass("bloc").addClass("hidden");
  $("#add").removeClass("hidden").addClass("bloc");

  $("#modal").removeClass("hidden").addClass("flex");
}
function closeModal() {

  $("#modal").removeClass("flex").addClass("hidden");
}
function setType(type) {
  document.getElementById("type").setAttribute("name", type)
}

function getProduct(id) {
  let product = $('#' + id);
  let picture = product.find(".picture").attr("product");
  $(".picture>img").remove();
  var img = $('<img>'); //Equivalent: $(document.createElement('img'))
  img.attr('src', 'assets/img/products/' + picture);
  img.appendTo('.picture');

  $('#id_product').val(id);
  $('#model').val(product.find(".model").attr("product"));
  $('#brand').val(product.find(".brand").attr("product"));
  $('#category').val(product.find(".category").attr("product"));
  $('#price').val(product.find(".price").attr("product"));
  $('#quantity').val(product.find(".quantity").attr("product"));
  $('#description').val(product.find(".description").attr("product"));

  $("#update").removeClass("hidden").addClass("bloc");
  $("#delete").removeClass("hidden").addClass("bloc");
  $("#add").removeClass("bloc").addClass("hidden");
  $("#modal").removeClass("hidden").addClass("flex");
}