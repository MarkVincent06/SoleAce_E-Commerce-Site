$(document).ready(function () {
  $(".delete-product").click((e) => {
    e.preventDefault();

    const id = e.target.value;

    Swal.fire({
      title: "Delete Product?",
      text: "Are you sure you want to delete this product?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "rgba(0, 0, 0, 0.5)",
      confirmButtonText: "Yes, delete it!",
      reverseButtons: "true",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          method: "POST",
          url: "code.php",
          data: {
            productId: id,
            deleteProduct: true,
          },
          success: function (response) {
            if (response == 200) {
              Swal.fire(
                "Deleted!",
                "Product has been deleted successfully.",
                "success"
              ).then(() => {
                location.reload();
              });
            } else if (response == 500) {
              Swal.fire(
                "Failed!",
                "Something went wrong. Please try again later.",
                "error"
              ).then(() => {
                location.reload();
              });
            }
          },
        });
      }
    });
  });

  $(".delete-sub-category").click((e) => {
    e.preventDefault();

    const id = e.target.value;

    Swal.fire({
      title: "Delete Subcategory?",
      text: "Are you sure you want to delete this subcategory?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "rgba(0, 0, 0, 0.5)",
      confirmButtonText: "Yes, delete it!",
      reverseButtons: "true",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          method: "POST",
          url: "code.php",
          data: {
            subcategoryId: id,
            deleteSubcategory: true,
          },
          success: function (response) {
            if (response == 200) {
              Swal.fire(
                "Deleted!",
                "Subcategory has been deleted successfully.",
                "success"
              ).then(() => {
                location.reload();
              });
            } else if (response == 500) {
              Swal.fire(
                "Failed!",
                "Something went wrong. Please try again later.",
                "error"
              ).then(() => {
                location.reload();
              });
            }
          },
        });
      }
    });
  });
});
