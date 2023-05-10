$(document).ready(() => {
  $("#signup-btn").click((e) => {
    // removes error validation
    if ($(".error").length > 0) {
      $("input").removeClass("error");
      $(".alert-container").removeClass("error");
    }

    // hides password tip
    $(".password-tip").hide();

    // submits the form if all the validations return true
    if (
      validateFirstName($("#firstname")) &
      validateLastName($("#lastname")) &
      validateEmail($("#email")) &
      validatePhone($("#phone")) &
      validatePassword($("#password"), $("#confirm-password"))
    ) {
      // if validation passsed, it will redirect to the authcode.php server
    } else {
      e.preventDefault();
    }
  });

  // Validate first name
  function validateFirstName(firstnameInput) {
    const firstnameInputValue = firstnameInput.val();

    if (firstnameInputValue === "") {
      displayError(firstnameInput, "Please enter first name.");
    } else if (firstnameInputValue.length < 2) {
      displayError(
        firstnameInput,
        "First name must contain at least 2 characters."
      );
    } else {
      return true;
    }

    return false;
  }

  // Validate last name
  function validateLastName(lastnameInput) {
    const lastnameInputValue = lastnameInput.val();

    if (lastnameInputValue === "") {
      displayError(lastnameInput, "Please enter last name.");
    } else if (lastnameInputValue.length < 2) {
      displayError(
        lastnameInput,
        "Last name must contain at least 2 characters."
      );
    } else {
      return true;
    }

    return false;
  }

  // Validate email
  function validateEmail(emailInput) {
    const emailInputValue = emailInput.val();
    const emailRegex =
      /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    const isEmailValid = emailRegex.test(emailInputValue);

    if (emailInputValue === "") {
      displayError(emailInput, "Please enter valid email address.");
    } else if (!isEmailValid) {
      displayError(emailInput, "Email address is not valid.");
    } else {
      return true;
    }

    return false;
  }

  // Validate phone
  function validatePhone(phoneInput) {
    const phoneInputValue = phoneInput.val();
    const phoneNumberPattern = /^(\+)?(0|91)?[789]\d{9}$/;

    const isPhoneNumberValid = phoneNumberPattern.test(phoneInputValue);

    if (phoneInputValue === "") {
      displayError(phoneInput, "Please enter phone number.");
    } else if (!isPhoneNumberValid) {
      displayError(phoneInput, "Phone number is not valid.");
    } else {
      return true;
    }

    return false;
  }

  //  Validate password
  function validatePassword(passwordInput, confirmPasswordInput) {
    const passwordInputValue = passwordInput.val();
    const confirmPasswordInputValue = confirmPasswordInput.val();

    if (passwordInputValue === "") {
      displayError(passwordInput, "Please enter password.");
    } else if (passwordInputValue.length < 6) {
      displayError(
        passwordInput,
        "Password is too short. It must be at least 6 characters."
      );
    } else {
      if (confirmPasswordInputValue === "") {
        displayError(confirmPasswordInput, "Please confirm your password.");
      } else if (passwordInputValue !== confirmPasswordInputValue) {
        displayError(
          confirmPasswordInput,
          "Those passwords didn't match. Try again."
        );
        $("#confirm-password").val("");
      } else {
        return true;
      }
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
