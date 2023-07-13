export const dataBlock = document.querySelector('.dashboard__data');
const statBlock = document.createElement('article');
statBlock.classList.add('data');
statBlock.setAttribute("id", "statistics");
function paragraphStat($element, $class) {
    let elementStat = document.createElement('p');
    elementStat.textContent = '245 ' + $element;
    elementStat.classList.add('stat');
    elementStat.classList.add('total_' + $class);
    statBlock.appendChild(elementStat);
}
export function generateStats() {
    const statTitle = document.createElement('h4');
    statTitle.textContent = 'Statistics';
    statBlock.appendChild(statTitle);
    dataBlock.appendChild(statBlock);
    paragraphStat('Invoices', 'invoices');
    paragraphStat('Contacts', 'contacts');
    paragraphStat('Companies', 'companies');
}
