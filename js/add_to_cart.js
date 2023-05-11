import { showToastMsg } from "./swalToastMsg.js";

$(document).ready(() => {
  // this will add the specific product into the cart
  $(".add-to-cart-btn").click((event) => {
    event.preventDefault();

    const productID = $(event.target)
      .closest(".product-container")
      .find(".hidden-product-id")
      .val();

    const selectedSize = $(event.target)
      .closest(".product-container")
      .find("#product-size")
      .val();

    $.ajax({
      url: "./crudDB/add_product_to_cart.php",
      method: "POST",
      data: {
        addToCart: "Adding product to cart",
        shoeID: productID,
        shoeSize: selectedSize,
      },
      success: (response) => {
        let swalToastMsg =
          "bottom-end | 3000 | success | Product added to the cart successfully! | 28em";
        let swalToastArr = swalToastMsg.split(" | ");

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
});
