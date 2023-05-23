$(document).ready(() => {
  $("#sort-input")
    .change((event) => {
      const selectedValue = $(event.target).val();

      alert(selectedValue);
      //  $.ajax({
      //    url: "your-api-url",
      //    method: "POST",
      //    data: { sortType: selectedValue },
      //    success: (response) => {
      //      console.log(response);
      //      // Update the UI or perform any other actions based on the response
      //    },
      //    error: (xhr, status, error) => {
      //      console.log(error);
      //    },
      //  });
    })
    .trigger("change");
});
