const tableName = document.createElement('h3') as HTMLHeadingElement

const tableSection = document.getElementsByClassName('section') as unknown as HTMLBodyElement

console.log(tableSection)

class TableRow {
    constructor(
      public invoiceNumber: string,
      public dueDate: string,
      public company: string,
      public createdAt: string
    ) {}
  }

function generateTable(){
    
    const table = document.createElement('table') as HTMLTableElement
    const headerRow = document.createElement('tr') as HTMLTableRowElement
    const headerCells = ['Invoice Number', 'Due Date', 'Company', 'Created At'] 
    headerCells.forEach(headerCellText => {
        const headerCell = document.createElement('th') as HTMLTableCellElement
        headerCell.textContent = headerCellText
        headerRow.appendChild(headerCell)
    })
    table.appendChild(headerRow)
    tableSection.appendChild(table)
}   

generateTable()


/* class TableRow {
    constructor(
      public invoiceNumber: string,
      public dueDate: string,
      public company: string,
      public createdAt: string
    ) {}
  }
  
  function generateTable(): HTMLTableElement {
    // Create table element
    const table = document.createElement('table');
  
    // Create table header row
    const headerRow = document.createElement('tr');
    const headerCells = ['Invoice Number', 'Due Date', 'Company', 'Created At'];
    headerCells.forEach(headerCellText => {
      const headerCell = document.createElement('th');
      headerCell.textContent = headerCellText;
      headerRow.appendChild(headerCell);
    });
    table.appendChild(headerRow);
  
    // Create table body rows with sample data
 /*    const sampleData = [
      new TableRow('INV001', '2023-07-10', 'Company A', '2023-07-01'),
      new TableRow('INV002', '2023-07-15', 'Company B', '2023-06-28'),
      new TableRow('INV003', '2023-07-20', 'Company C', '2023-07-03'),
      new TableRow('INV004', '2023-07-25', 'Company D', '2023-07-02'),
      new TableRow('INV005', '2023-07-30', 'Company E', '2023-07-05'),
      new TableRow('INV006', '2023-08-05', 'Company F', '2023-06-30')
    ]; */
 /*  const cellValue:string|number = 0
    
      const row = document.createElement('tr');
      const { invoiceNumber, dueDate, company, createdAt } = data;
      const cellValues = [invoiceNumber, dueDate, company, createdAt];
  
      cellValues.forEach(cellValue => {
        const cell = document.createElement('td');
        cell.textContent = cellValue;
        row.appendChild(cell);
      });
  
      table.appendChild(row);
    };
  
    return table;
  
  
  // Usage example: Append the generated table to a container element with id "tableContainer"
  const tableContainer = document.getElementsByClassName('section') as HTMLCollectionOf<Element>; */

  