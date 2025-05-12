export default function filter() {
    let filterBtn = document.getElementById('filter-btn');
    filterBtn.addEventListener('click', function () {
        document.getElementById('filter-form').classList.remove('hide');
    })

}