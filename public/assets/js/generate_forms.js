export function generateForm($id, $data1, $data2, $data3) {
    //we create a proper form section into the main section of the page 
    const mainSection = document.querySelector('main');
    const formSection = document.createElement('section');
    formSection.classList.add('dashboard_form');
    formSection.setAttribute('id', $id); //we use the first parameter to indicate the id and the form head
    mainSection.appendChild(formSection);
    const formHead = document.createElement('h4');
    formHead.textContent = "New " + $id;
    const form = document.createElement('form'); //we create a form with inputs and a submit, using parameters to specify the data needed.
    form.innerHTML = `<form action="dashboard.php" method="get">
                          <label for="` + $data1 + `"></label>
                          <input type="input"  placeholder ="` + $data1 + `" name="` + $data1 + `" class="` + $data1 + `">
                          <label for="` + $data2 + `"></label>
                          <input type="input"  placeholder ="` + $data2 + `" name="` + $data2 + `" class="` + $data2 + `">
                          <label for="` + $data3 + `"></label>
                          <input type="input"  placeholder ="` + $data3 + `" name="` + $data3 + `" class="` + $data3 + `">
                          <input type="submit" value"save"/>
                          </form>`;
    formSection.appendChild(formHead);
    formSection.appendChild(form);
}
