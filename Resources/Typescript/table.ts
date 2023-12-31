export const dataSection = document.querySelector('.dashboard__data') as HTMLSelectElement
        

       
//generate an article containing a table with multiple parameters

export function generateTableArticle($id:string,$element:string, $data1: string, $data2: string, $data3: string){

    //create an article, with it's ID parametrable
    const tableBlock = document.createElement('article') as HTMLElement
          tableBlock.classList.add('data_table_section')
          tableBlock.classList.add('section')
          tableBlock.setAttribute('id',$id)

    //create a head with parametrable title      
    let tableTitle = document.createElement('h4') as HTMLParagraphElement
        tableTitle.textContent = 'Last '+ $element
        tableTitle.classList.add('data_title')

        //create a table
        const table = document.createElement('table') as HTMLTableElement
            table.classList.add('data_table')

    
    //Nesting the article tag
    dataSection.appendChild(tableBlock)
    tableBlock.appendChild(tableTitle)    
    
    tableBlock.appendChild(table)

    const tableHead = document.createElement('thead') as HTMLTableCaptionElement
    const tableRow = document.createElement('tr') as HTMLTableRowElement     
    //generate 3 tableheads tags, which content is paramable            
    let tableHead1 = document.createElement('th') as HTMLTableCellElement
        tableHead1.textContent = $data1    

    let tableHead2 = document.createElement('th') as HTMLTableCellElement
        tableHead2.textContent = $data2
    
    let tableHead3 = document.createElement('th') as HTMLTableCellElement
        tableHead3.textContent = $data3 
    
    //Nesting the table    
    tableRow.appendChild(tableHead1)
    tableRow.appendChild(tableHead2)
    tableRow.appendChild(tableHead3)
    tableHead.appendChild(tableRow)
    table.appendChild(tableHead)
}

//This function complete the tables by using parameters
export function rowInfo($id: string, $value1: string, $value2: string, $value3: string){
    //Establish the proper article by using an id parameter
    let tableContainer = document.getElementById($id) as HTMLElement
    const table = tableContainer.lastChild?.firstChild?.firstChild as HTMLTableElement    
    console.log(tableContainer?.id)

    //Creating a constant for each table head
    const tableElement1 = table?.firstChild as HTMLTableCellElement
    const tableElement2 = table?.firstChild?.nextSibling as HTMLTableCellElement
    const tableElement3 = table?.lastChild as HTMLTableCellElement
    
    console.log(tableElement1.textContent ,tableElement2.textContent ,tableElement3.textContent)
    
    const tableBody = document.createElement('tbody') as HTMLTableCaptionElement
    const tableElement = tableContainer.lastChild as HTMLTableElement
    
    tableElement.appendChild(tableBody)

    //Using a for loop to generate the cells content using a parameter
    for(let i=0 ; i < 6 ; i++){
    const tableRow  = document.createElement('tr') as HTMLTableRowElement
    tableBody.appendChild(tableRow)
    let tableCell1 = document.createElement('td') as HTMLTableCellElement
        tableCell1.textContent = $value1
        tableRow.appendChild(tableCell1)

    let tableCell2 = document.createElement('td') as HTMLTableCellElement    
        tableCell2.textContent = $value2
        tableRow.appendChild(tableCell2)
    
    let tableCell3 = document.createElement('td') as HTMLTableCellElement  
        tableCell3.textContent = $value3
        tableRow.appendChild(tableCell3)
    } 
} 