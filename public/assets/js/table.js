export const dataSection = document.querySelector('.dashboard__data');
//generate an article containing a table with multiple parameters
export function generateTableArticle($id, $element, $data1, $data2, $data3) {
    //create an article, with it's ID parametrable
    const tableBlock = document.createElement('article');
    tableBlock.classList.add('data_table_section');
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
    //generate 3 tableheads tags, which content is paramable            
    let tableHead1 = document.createElement('th');
    tableHead1.textContent = $data1;
    let tableHead2 = document.createElement('th');
    tableHead2.textContent = $data2;
    let tableHead3 = document.createElement('th');
    tableHead3.textContent = $data3;
    //Nesting the table    
    table.appendChild(tableHead1);
    table.appendChild(tableHead2);
    table.appendChild(tableHead3);
}
//This function complete the tables by using parameters
export function rowInfo($id, $value1, $value2, $value3) {
    var _a;
    //Establish the proper article by using an id parameter
    let tableContainer = document.getElementById($id);
    const table = tableContainer.lastChild;
    console.log(tableContainer === null || tableContainer === void 0 ? void 0 : tableContainer.id);
    //Creating a constant for each table head
    const tableElement1 = table === null || table === void 0 ? void 0 : table.firstChild;
    const tableElement2 = (_a = table === null || table === void 0 ? void 0 : table.firstChild) === null || _a === void 0 ? void 0 : _a.nextSibling;
    const tableElement3 = table === null || table === void 0 ? void 0 : table.lastChild;
    console.log(tableElement1.textContent, tableElement2.textContent, tableElement3.textContent);
    //Using a for loop to generate the cells content using a parameter
    for (let i = 0; i < 6; i++) {
        let tableCell1 = document.createElement('td');
        tableCell1.textContent = $value1;
        tableElement1.appendChild(tableCell1);
        let tableCell2 = document.createElement('td');
        tableCell2.textContent = $value2;
        tableElement2.appendChild(tableCell2);
        let tableCell3 = document.createElement('td');
        tableCell3.textContent = $value3;
        tableElement3.appendChild(tableCell3);
    }
}
