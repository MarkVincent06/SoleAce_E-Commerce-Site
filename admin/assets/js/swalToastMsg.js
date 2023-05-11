// this function is for ajax
export function showToastMsg(
  toastPos,
  toastTimer,
  toastIcon,
  toastTitleMsg,
  toastWidth
) {
  let position = toastPos;
  let timer = parseInt(toastTimer);
  let icon = toastIcon;
  let titleMsg = toastTitleMsg;
  let width = toastWidth;

  const Toast = Swal.mixin({
    toast: true,
    position: position,
    showConfirmButton: false,
    timer: timer,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener("mouseenter", Swal.stopTimer);
      toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
  });

  Toast.fire({
    icon: icon,
    title: titleMsg,
    width: width,
  });
}

$(document).ready(() => {
  // This will get the message in the hidden input
  const message = $("#toastMsg-input").val();

  if (message) {
    let swalToastArr = message.split(" | ");

    showToastMsg(
      swalToastArr[0],
      swalToastArr[1],
      swalToastArr[2],
      swalToastArr[3],
      swalToastArr[4]
    );
  }
});
