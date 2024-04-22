document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('searchInput');
    const productTable = document.getElementById('productTable');
    const noResultsMessage = document.getElementById('noResultsMessage');
  
    searchInput.addEventListener('input', () => {
      const searchValue = searchInput.value.toLowerCase();
  
      // Get all table rows
      const rows = Array.from(productTable.getElementsByTagName('tr'));
  
      let matchingRowCount = 0;
  
      // Hide rows that don't match the search value
      for (const row of rows) {
        const cells = Array.from(row.getElementsByTagName('td'));
        const orderIdCell = cells.find(cell => cell.classList.contains('ordId'));
  
        if (orderIdCell) {
          const orderId = orderIdCell.textContent.toLowerCase();
  
          const matchesSearchValue = orderId.includes(searchValue);
          row.style.display = matchesSearchValue ? '' : 'none';
  
          if (matchesSearchValue) {
            matchingRowCount++;
          }
        }
      }
  
      // Show or hide the "No products found" message
      noResultsMessage.style.display = matchingRowCount > 0 ? 'none' : '';
    });
  });