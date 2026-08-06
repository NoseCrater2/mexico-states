import { fetchData } from "./fetchData";

const table = document.getElementById('results');
const searchInput = document.getElementById('stateSearch');
const filterButtons = document.querySelectorAll('.sort');
const debounceTime = 300;
let {sort, direction, page } = window.statesConfig;
let debounce;
let search =  '';

async function loadStates(url = '/states/') {
    table.innerHTML = await fetchData(url, {direction, page, search, sort});
}

searchInput.addEventListener('input', function () {
    search = this.value;
    clearTimeout(debounce);

    debounce = setTimeout(() => {
        page = 1;
        loadStates();
    }, debounceTime);

});

filterButtons.forEach(button => {
    button.addEventListener('click', function () {

    const newSort = this.dataset.sort;

    if (sort === newSort) {
        direction = direction === 'asc' ? 'desc' : 'asc';
    } else {
        sort = newSort;
        direction = 'asc';
    }
    loadStates();
    this.children[0].innerHTML = direction  === 'desc' ?
                                'keyboard_arrow_up' :
                                'keyboard_arrow_down'
    });
});
