import { showToastMsg } from "./swalToastMsg.js";

$(document).ready(() => {
  // this will add the specific product into the cart
  $(".add-to-cart-btn").click((event) => {
    event.preventDefault();

    const productID = $(event.target)
      .closest(".product-container")
      .find(".add-to-cart-btn")
      .val();

    const selectedSize = $(event.target)
      .closest(".product-container")
      .find("#product-size")
      .val();

    const selectedQuantity = $(event.target)
      .closest(".product-container")
      .find("#product-quantity")
      .val();

    $.ajax({
      url: "./functions/handleCart.php",
      method: "POST",
      data: {
        productID: productID,
        productSize: selectedSize,
        productQuantity: selectedQuantity,
        scope: "add",
      },
      success: (response) => {
        let swalToastArr = [];
        if (response == 201) {
          let swalToastMsg =
            "bottom-end | 3000 | success | Product added to the cart successfully! | 28em";
          swalToastArr = swalToastMsg.split(" | ");
          setTimeout(() => {
            location.reload();
          }, 3000);
        } else if (response == 500) {
          let swalToastMsg =
            "bottom-end | 3000 | error | Something went wrong! | 28em";
          swalToastArr = swalToastMsg.split(" | ");
        } else if (response == "existing") {
          let swalToastMsg =
            "bottom-end | 3000 | warning | Product is already existing in the cart! | 28em";
          swalToastArr = swalToastMsg.split(" | ");
        } else if (response == "login") {
          let swalToastMsg =
            "top-end | 5000 | info | Oops! It seems you're not signed in. Please sign in to add items to your cart and proceed with your purchase. | 32em";
          swalToastArr = swalToastMsg.split(" | ");
        }
        showToastMsg(
          swalToastArr[0],
          swalToastArr[1],
          swalToastArr[2],
          swalToastArr[3],
          swalToastArr[4]
        );
      },
    });
  });

  $(".product-size").change((event) => {
    const productID = $(event.target)
      .closest(".cart--product-container")
      .find(".hiddenInput")
      .val();

    const selectedSize = $(event.target).val();
    const selectedQuantity = $(event.target)
      .closest(".cart--product-container")
      .find(".product-quantity")
      .val();

    $.ajax({
      url: "./functions/handleCart.php",
      method: "POST",
      data: {
        productID: productID,
        productSize: selectedSize,
        productQuantity: selectedQuantity,
        scope: "update",
      },
      success: function (response) {
        let swalToastArr = [];
        if (response == 500) {
          let swalToastMsg =
            "bottom-end | 3000 | error | Something went wrong! | 28em";
          swalToastArr = swalToastMsg.split(" | ");

          showToastMsg(
            swalToastArr[0],
            swalToastArr[1],
            swalToastArr[2],
            swalToastArr[3],
            swalToastArr[4]
          );
        }
      },
    });
  });

  $(".product-quantity").change((event) => {
    const productID = $(event.target)
      .closest(".cart--product-container")
      .find(".hiddenInput")
      .val();

    const selectedQuantity = $(event.target).val();
    const selectedSize = $(event.target)
      .closest(".cart--product-container")
      .find(".product-size")
      .val();

    $.ajax({
      url: "./functions/handleCart.php",
      method: "POST",
      data: {
        productID: productID,
        productSize: selectedSize,
        productQuantity: selectedQuantity,
        scope: "update",
      },
      success: function (response) {
        let swalToastArr = [];
        if (response == 201) {
          location.reload();
        }
        if (response == 500) {
          let swalToastMsg =
            "bottom-end | 3000 | error | Something went wrong! | 28em";
          swalToastArr = swalToastMsg.split(" | ");

          showToastMsg(
            swalToastArr[0],
            swalToastArr[1],
            swalToastArr[2],
            swalToastArr[3],
            swalToastArr[4]
          );
        }
      },
    });
  });

  $(document).on("click", ".delete-item", function () {
    const cartID = $(this).val();

    $.ajax({
      url: "./functions/handleCart.php",
      method: "POST",
      data: {
        cartID: cartID,
        scope: "delete",
      },
      success: function (response) {
        let swalToastArr = [];
        if (response == 201) {
          location.reload();
        }
        if (response == 500) {
          let swalToastMsg =
            "bottom-end | 3000 | error | Something went wrong! | 28em";
          swalToastArr = swalToastMsg.split(" | ");

          showToastMsg(
            swalToastArr[0],
            swalToastArr[1],
            swalToastArr[2],
            swalToastArr[3],
            swalToastArr[4]
          );
        }
      },
    });
  });
});
