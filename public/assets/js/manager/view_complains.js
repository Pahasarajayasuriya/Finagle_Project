document.getElementById('searchInput').addEventListener('keyup', function() {
  var input, filter, table, tr, td, i, txtValue;
  var noResultsMessage = document.getElementById('noResultsMessage');
  input = document.getElementById("searchInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("complaintsTableBody");
  tr = table.getElementsByTagName("tr");

  var hasResults = false;

  for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0]; // Change this to the column you want to filter
      if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
              hasResults = true;
          } else {
              tr[i].style.display = "none";
          }
      }       
  }

  if (hasResults) {
      noResultsMessage.style.display = 'none';
  } else {
      noResultsMessage.style.display = 'block';
  }
});