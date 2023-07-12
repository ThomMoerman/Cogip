export const dataBlock = document.getElementById('3') as HTMLSelectElement


const statBlock = document.createElement('article') as HTMLElement
statBlock.classList.add('data')
statBlock.setAttribute("id","statistics")

function paragraphStat($element:string, $class:string){
    let elementStat = document.createElement('p') as HTMLParagraphElement
            elementStat.textContent = '245 '+ $element
            elementStat.classList.add('stat')
            elementStat.classList.add('total_'+$class)

    statBlock.appendChild(elementStat)
}

export function generateStats() {
        const statTitle = document.createElement('h4') as HTMLHeadingElement  
              statTitle.textContent = 'Statistics'

        statBlock.appendChild(statTitle)
        dataBlock.appendChild(statBlock)
        
        paragraphStat('Invoices','invoices')
        paragraphStat('Contacts','contacts')
        paragraphStat('Companies','companies')
    }
