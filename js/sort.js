$(document).ready(() => {
  $("#sort-input").change((event) => {
    const selectedValue = $(event.target).val();

    const currentURL = window.location.href;
    const newURL = `${currentURL}&sort=${selectedValue}`;
    window.location.href = newURL;
  });
});
