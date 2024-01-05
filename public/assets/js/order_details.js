   // Get the modal
   const modal = document.getElementById("myModal");

   // Get the button that opens the modal
   const btn = document.getElementById("detailButton");

   // Get the <closeButton> element that closes the modal
   const closeButton = document.getElementsByClassName("close")[0];

   // Get the confirmation and cancellation buttons
   const confirmBtn = document.getElementById("confirmDelete");
   const cancelBtn = document.getElementById("cancelDelete");

   // When the user clicks on the button, open the modal
   btn.onclick = function () {
     modal.style.display = "block";
    };

    // When the user clicks on <closeButton> (x), close the modal
    closeButton.onclick = function () {
      modal.style.display = "none";
    };

    // When the user clicks cancel, close the modal
    cancelBtn.onclick = function () {
      modal.style.display = "none";
    };

    // When the user clicks confirm, delete data and close the modal
    confirmBtn.onclick = function () {
      // Perform data deletion here (you can add your logic)
      // For example, deleteDataFunction();

      // For demonstration purposes, simply log a message
      console.log("Data deleted successfully.");
      modal.style.display = "none";
    };

    //
    closeButton.addEventListener("mouseenter", function () {
      closeButton.classList.add("bx-flashing");
    });

    closeButton.addEventListener("mouseleave", function () {
      closeButton.classList.remove("bx-flashing");
    });

