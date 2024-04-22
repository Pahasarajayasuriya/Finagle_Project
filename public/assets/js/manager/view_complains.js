document.addEventListener("DOMContentLoaded", () => {
  const searchInput = document.getElementById("search");
  const complaintList = document.getElementById("complaintList");

  searchInput.addEventListener("input", () => {
    const searchValue = searchInput.value.toLowerCase();

    // Fetch complaints based on the search value (you need to implement this)
    const filteredComplaints = fetchFilteredComplaints(searchValue);

    // Update the complaint list with the filtered complaints
    updateComplaintList(filteredComplaints);
  });

  // Initial fetch and display of all complaints
  const allComplaints = fetchAllComplaints();
  updateComplaintList(allComplaints);
});

// Function to fetch all complaints (you need to implement this)
function fetchAllComplaints() {
  // Example: You may fetch complaints from a database or an API
  return [
    {
      customerName: "Sanath Nishantha",
      complaintID: 12,
      complaint: "This is a complaint about the product...",
    },
    {
      customerName: "Pahasara Jayasuriya",
      complaintID: 36,
      complaint: "This is a complaint about the product...",
    },
    // Add more complaints as needed
  ];
}

// Function to fetch complaints based on the search value (you need to implement this)
function fetchFilteredComplaints(searchValue) {
  // Example: You may filter complaints based on customer name, complaint ID, or other criteria
  return fetchAllComplaints().filter(
    (complaint) =>
      complaint.customerName.toLowerCase().includes(searchValue) ||
      complaint.complaintID.toString().includes(searchValue)
  );
}

// Function to update the complaint list on the page
function updateComplaintList(complaints) {
  const complaintList = document.getElementById("complaintList");
  complaintList.innerHTML = "";

  if (complaints.length === 0) {
    const div = document.createElement("div");
    div.textContent = "Complaint not found";
    complaintList.appendChild(div);
  } else {
    complaints.forEach((complaint) => {
      const div = document.createElement("div");
      div.classList.add("complaint-container");
      div.innerHTML = `
            <div class="complaint">
                <h4 class="order-id">Complaint ID : ${complaint.complaintID}</h4>

                 <div class="order-details">
                    <p class="topic">CUSTOMER NAME</p>
                    <h4>${complaint.customerName}</h4>
                    

                    <p class="topic">COMPLAINT</p>
                    <h4>${complaint.complaint}</h4>
      
                  </div>
                <div class="button-container">
                   <button class="response-button" onclick="redirectToResponsePage()">Response</button>
              
                </div>
            </div>
            `;
      complaintList.appendChild(div);
    });
  }
}
function redirectToResponsePage() {
  // Change the URL to the desired location (response-complaint.html)
  window.location.href = "response_complaint.html";
}