export const dataSection = document.querySelector('.dashboard__data');
//generate an article containing a table with multiple parameters
export function generateTableArticle($id, $element, $data1, $data2, $data3) {
    //create an article, with it's ID parametrable
    const tableBlock = document.createElement('article');
    tableBlock.classList.add('data_table_section');
    tableBlock.classList.add('section');
    tableBlock.setAttribute('id', $id);
    //create a head with parametrable title      
    let tableTitle = document.createElement('h4');
    tableTitle.textContent = 'Last ' + $element;
    tableTitle.classList.add('data_title');
    //create a table
    const table = document.createElement('table');
    table.classList.add('data_table');
    //Nesting the article tag
    dataSection.appendChild(tableBlock);
    tableBlock.appendChild(tableTitle);
    tableBlock.appendChild(table);
    const tableHead = document.createElement('thead');
    const tableRow = document.createElement('tr');
    //generate 3 tableheads tags, which content is paramable            
    let tableHead1 = document.createElement('th');
    tableHead1.textContent = $data1;
    let tableHead2 = document.createElement('th');
    tableHead2.textContent = $data2;
    let tableHead3 = document.createElement('th');
    tableHead3.textContent = $data3;
    //Nesting the table    
    tableRow.appendChild(tableHead1);
    tableRow.appendChild(tableHead2);
    tableRow.appendChild(tableHead3);
    tableHead.appendChild(tableRow);
    table.appendChild(tableHead);
}
//This function complete the tables by using parameters
export function rowInfo($id, $value1, $value2, $value3) {
    var _a, _b, _c;
    //Establish the proper article by using an id parameter
    let tableContainer = document.getElementById($id);
    const table = (_b = (_a = tableContainer.lastChild) === null || _a === void 0 ? void 0 : _a.firstChild) === null || _b === void 0 ? void 0 : _b.firstChild;
    console.log(tableContainer === null || tableContainer === void 0 ? void 0 : tableContainer.id);
    //Creating a constant for each table head
    const tableElement1 = table === null || table === void 0 ? void 0 : table.firstChild;
    const tableElement2 = (_c = table === null || table === void 0 ? void 0 : table.firstChild) === null || _c === void 0 ? void 0 : _c.nextSibling;
    const tableElement3 = table === null || table === void 0 ? void 0 : table.lastChild;
    console.log(tableElement1.textContent, tableElement2.textContent, tableElement3.textContent);
    const tableBody = document.createElement('tbody');
    const tableElement = tableContainer.lastChild;
    tableElement.appendChild(tableBody);
    //Using a for loop to generate the cells content using a parameter
    for (let i = 0; i < 6; i++) {
        const tableRow = document.createElement('tr');
        tableBody.appendChild(tableRow);
        let tableCell1 = document.createElement('td');
        tableCell1.textContent = $value1;
        tableRow.appendChild(tableCell1);
        let tableCell2 = document.createElement('td');
        tableCell2.textContent = $value2;
        tableRow.appendChild(tableCell2);
        let tableCell3 = document.createElement('td');
        tableCell3.textContent = $value3;
        tableRow.appendChild(tableCell3);
    }
}
