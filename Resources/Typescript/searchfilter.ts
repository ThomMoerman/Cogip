
  const coreTable = document.querySelector('.filter__section') as HTMLBodyElement
  
  console.log(coreTable)

    const searchBar = document.createElement('input') as HTMLInputElement
    searchBar.setAttribute('id', 'search_filter');
    searchBar.setAttribute('onkeyup', 'searchFilter()');
    searchBar.setAttribute('placeholder', 'Search by names');

    coreTable.appendChild(searchBar);


function searchFilter () {
  var input, filter, table, tr, td, i, txtValue
  input = document.getElementById("search_filter") as HTMLInputElement
  filter = input.value.toUpperCase()
  table = document.getElementById("list_table") as HTMLTableElement
  tr = table.getElementsByTagName("tr") as HTMLCollectionOf<HTMLTableRowElement>

// Loop through all table rows, and hide those who don't match the search query
for (i = 0; i < tr.length; i++) {
  td = tr[i].getElementsByTagName("td")[0];
  if (td) {
    txtValue = td.textContent || td.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      tr[i].style.display = "";
    } else {
      tr[i].style.display = "none";
    }
  }
} 
}
searchFilter()

