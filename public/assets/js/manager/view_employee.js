function showPopup() {
    var popup = document.getElementById("popup");
    popup.style.display = "block";
}

function hidePopup() {
    var popup = document.getElementById("popup");
    popup.style.display = "none";
}

function assignGoal() {
    var goal = document.getElementById("goalInput").value;

    // Send the goal data to the server-side script using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "Assign_goals.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                alert("Goal assigned successfully!");
                hidePopup(); // Hide the popup after assigning the goal
            } else {
                alert("Error: Unable to assign goal.");
            }
        }
    };
    xhr.send("goal=" + encodeURIComponent(goal));
}
