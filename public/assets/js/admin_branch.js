document.addEventListener('DOMContentLoaded', () => {
   
   
});



function openReport() {
    const popupContainer = document.getElementById('popupContainer');
    const overlay = document.getElementById('overlay');

    popupContainer.classList.add('show');
    overlay.classList.add('show');
}

function closePopup() {
    const popupContainer = document.getElementById('popupContainer');
    const overlay = document.getElementById('overlay');

    popupContainer.classList.remove('show');
    overlay.classList.remove('show');
}

function submitForm() {
    // Add your form submission logic here
    
    // Close the popup and overlay after submitting the form
    closePopup();
}


function openEditPopupDialog( description, end_date) {
    const editDescriptionInput = document.getElementById('editDescription');
    const editEndDateInput = document.getElementById('editEndDate');

    // Populate the edit pop-up with current advertisement details
    editDescriptionInput.value = description;
    editEndDateInput.value = end_date;

    openEditPopupDialog();

}

function openEditPopupDialog() {
    const editPopupContainer = document.getElementById('editPopupContainer');
    const overlay = document.getElementById('overlay');

    editPopupContainer.classList.add('show');
    overlay.classList.add('show');
}



function closeEditPopup() {
    const editPopupContainer = document.getElementById('editPopupContainer');
    const overlay = document.getElementById('overlay');

    editPopupContainer.classList.remove('show');
    overlay.classList.remove('show');
}

function submitEditForm() {
    // Add your logic to submit the edited form
    
    // Close the edit popup and overlay after submitting the form
    closeEditPopup();
}
