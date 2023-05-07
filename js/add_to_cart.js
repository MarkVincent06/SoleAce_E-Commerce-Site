$(document).ready(() => {
  // this will add the specific product into the cart
  $(".add-to-cart-btn").click((event) => {
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
        console.log("Added to cart successfully!!!");
        location.reload();
      },
    });
  });
});
