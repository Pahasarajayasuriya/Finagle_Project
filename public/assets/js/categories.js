let popupView = document.getElementById("popup-view");
let overlay = document.getElementById("overlay");
let popupReport = document.querySelector(".popup-report");

function openView(){
    
    popupView.classList.add("open-popup-view");
    overlay.classList.add("overlay-active");
}
function closeView(){
    popupView.classList.remove("open-popup-view");
    overlay.classList.remove("overlay-active");
}	

function openReport(){
    popupReport.classList.add("open-popup-report");
    overlay.classList.add("overlay-active");
}
function closeReport(){
    popupReport.classList.remove("open-popup-report");
    overlay.classList.remove("overlay-active");
}

document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.querySelector('.form-group');
    const rows = document.querySelectorAll('.table tbody tr');
    const noResultsMessage = document.getElementById('no-results-message');

    searchInput.addEventListener('input', function () {
        const searchTerm = searchInput.value.toLowerCase();
        let found = false;

        rows.forEach(row => {
            const categoryName = row.querySelector('.desc').textContent.toLowerCase();

            if (categoryName.includes(searchTerm)) {
                row.style.display = 'table-row';
                found = true;
            } else {
                row.style.display = 'none';
            }
        });
    });
});
