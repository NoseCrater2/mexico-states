import { fetchData } from "./fetchData";

const selectInput = document.getElementById('select-filter');
const searchInput = document.getElementById('munSearch');
const table = document.getElementById('munresults');
const debounceTime = 300;

let {cve_ent, sort, direction, page} = window.municipalitiesConfig;
let search = '';
let debounce;

if(sort && direction){
    selectInput.value = `${sort},${direction}`;
}

async function loadMun(url = '/states/'+cve_ent) {
    table.innerHTML = await fetchData(url, {direction, page, search, sort});
}

searchInput.addEventListener('input', function () {
        search = this.value;
        clearTimeout(debounce);

        debounce = setTimeout(() => {
            page = 1;
            loadMun();
        }, debounceTime);
});

selectInput.addEventListener('change', function(e){
    const value = e.target.value;
    [sort, direction] = value.split(',');
    loadMun();
})
