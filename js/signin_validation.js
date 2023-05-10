$(document).ready(() => {
  $("#signin-form").submit((e) => {
    // removes error validation
    if ($(".error").length > 0) {
      $("input").removeClass("error");
      $(".alert-container").removeClass("error");
    }

    // hides password tip
    $(".password-tip").hide();

    // submits the form if all the validations return true
    if (validateEmail($("#email")) & validatePassword($("#password"))) {
      // if validation passsed, it will redirect to the authcode.php server
    } else {
      e.preventDefault();
    }
  });

  // Validate email
  function validateEmail(emailInput) {
    const emailInputValue = emailInput.val();

    if (emailInputValue === "") {
      displayError(emailInput, "Please enter valid email address.");
    } else {
      return true;
    }

    return false;
  }

  //  Validate password
  function validatePassword(passwordInput) {
    const passwordInputValue = passwordInput.val();

    if (passwordInputValue === "") {
      displayError(passwordInput, "Please enter password.");
    } else {
      return true;
    }
    return false;
  }

  // displays error depending on the input and the message
  function displayError(input, errorMessage) {
    input.addClass("error");
    input.parent().find(".alert-container").addClass("error");
    input.parent().find("small").text(errorMessage);
  }
});
