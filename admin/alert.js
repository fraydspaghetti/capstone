$(document).ready(function () {
  $("#admin-login").submit(function (e) {
    e.preventDefault();

    var formData = $(this).serialize();

    $.ajax({
      type: "post",
      url: "function.php",
      data: formData,
      dataType: "json",

      success: function (response) {
        if (response.success) {
          if (response.admin === "admin success") {
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
              title: "Signed in successfully",
            }).then(() => {
              window.location.replace("dashboard.php");
            });
          } else if (response.error === "not valid") {
            Swal.fire({
              icon: "error",
              title: "Wrong Username or password",
              confirmButtonText: "Okay",
            });
          }
        } else {
          Swal.fire({
            icon: "error",
            title: "Error occurred",
            confirmButtonText: "Okay",
          });
        }
      },
      error: function (xhr, status, error) {
        Swal.fire({
          icon: "error",
          title: "AJAX Error",
          text: error,
          confirmButtonText: "Okay",
        });
      },
    });
  });
});

$(document).ready(function () {
  $("#update-contactinfo").submit(function (e) {
    e.preventDefault();

    var formData = $(this).serialize();

    var address = $("#address").val();
    var email = $("#email").val();
    var contactno = $("#contactno").val();

    $.ajax({
      type: "post",
      url: "function.php",
      data: formData,
      dataType: "json",

      success: function (response) {
        if (response.success) {
          Swal.fire({
            icon: "success",
            title: "Updated Successfully",
            showConfirmButton: false,
            timer: 3000,
          }).then(function () {
            Swal.fire({
              position: "center",
              icon: "success",
              title: "Contact info Summary",
              html:
                "Address: " +
                address +
                "<br>" +
                "Email: " +
                email +
                "<br>" +
                "Contact No.: " +
                contactno +
                "<br>",
            });
          });
        }
      },
    });
  });
});

// delete event
function showDeleteConfirmation(event) {
  event.preventDefault();

  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = event.target.href;
      deleteData(url);
    }
  });
}

function deleteData(url) {
  $.ajax({
    url: url,
    type: "DELETE",
    success: function (response) {
      Swal.fire("Deleted!", "The booking has been deleted.", "success").then(
        () => {
          location.reload();
        }
      );
    },
    error: function (xhr, status, error) {
      Swal.fire("Error", "An error occurred while deleting the file.", "error");
    },
  });
}

//   confirm
function showConfirm(event) {
  event.preventDefault();

  // Disable the button to prevent further clicks
  event.target.disabled = true;

  Swal.fire({
    title: "Are you sure you really want to confirm this booking?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, confirm it!",
  })
    .then((result) => {
      if (result.isConfirmed) {
        // Get the href from the clicked button
        const href = event.target.href;
        if (href) {
          // Perform the action (e.g., navigating to a URL)
          window.location.href = href;
          window.reload();
        }
      } else {
        // Re-enable the button in case of cancellation
        event.target.disabled = false;
      }
    })
    .catch((error) => {
      // Handle any errors that occur with the Swal library
      console.error("Error:", error);
      // Re-enable the button in case of an error
      event.target.disabled = false;
    });

  return false;
}
function showcancel(event) {
  event.preventDefault();

  Swal.fire({
    title: "Are you sure you really want to cancel this booking?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, cancel it!",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire("Cancelled", "The booking has been cancelled.", "success").then(
        () => {
          const href = event.target.href;
          if (href) {
            window.location.href = href;
          }
        }
      );
    } else {
      // Re-enable the button if cancel is clicked
      event.target.disabled = false;
    }
  });

  return false;
}

// delete user
function deleteuser(event) {
  event.preventDefault();

  Swal.fire({
    title: "Are you sure you want to delete this user?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete this user!",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = event.target.href;
      deleted(url);
    }
  });
}

function deleted(url) {
  $.ajax({
    url: url,
    type: "DELETE",
    success: function (response) {
      Swal.fire("Deleted!", "The user has been deleted.", "success").then(
        () => {
          location.reload();
        }
      );
    },
    error: function (xhr, status, error) {
      Swal.fire("Error", "An error occurred while deleting the file.", "error");
    },
  });
}

function Deactive(event) {
  event.preventDefault();

  // Disable the button to prevent further clicks
  const button = event.target;
  button.disabled = true;

  Swal.fire({
    title: "Are you sure you really want to active this feedbacks?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, active it!",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire("Confirmed!", "The feedbacks has been active.", "success").then(
        () => {
          const href = button.href;
          if (href) {
            window.location.href = href;
            window.reload();
          }
        }
      );
    } else {
      // Enable the button if the confirmation is canceled
      button.disabled = false;
    }
  });

  return false;
}

function Active(event) {
  event.preventDefault();

  // Disable the button to prevent further clicks
  const button = event.target;
  button.disabled = true;

  Swal.fire({
    title: "Are you sure you really want to inactive this feedbacks?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, inactive it!",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire(
        "Confirmed!",
        "The feedbacks has been inactive.",
        "success"
      ).then(() => {
        const href = button.href;
        if (href) {
          window.location.href = href;
          window.reload();
        }
      });
    } else {
      // Enable the button if the confirmation is canceled
      button.disabled = false;
    }
  });

  return false;
}

// Delete Rented Unit

function DeleteUnit(event) {
  event.preventDefault();

  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = event.target.href;
      deleteData(url);
    }
  });
}

function deleteData(url) {
  $.ajax({
    url: url,
    type: "DELETE",
    success: function (response) {
      Swal.fire("Deleted!", "The booking has been deleted.", "success").then(
        () => {
          location.reload();
        }
      );
    },
    error: function (xhr, status, error) {
      Swal.fire("Error", "An error occurred while deleting the file.", "error");
    },
  });
}
