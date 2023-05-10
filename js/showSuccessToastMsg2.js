$(document).ready(() => {
  // This will get the message in the hidden input
  const message = $("#hidden-input").val();

  // Shows message using sweet alert package
  if (message) {
    showSuccessMsg(message);
  }

  function showSuccessMsg(titleMsg) {
    const Toast = Swal.mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
      },
    });

    Toast.fire({
      icon: "success",
      title: titleMsg,
      width: "32em",
    });
  }
});
