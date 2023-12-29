function toggleDropdown() {
    let dropdownContent = document.querySelector(".dropdown-content");
    if (dropdownContent) {
        dropdownContent.classList.toggle("show");
        let flecha = document.getElementById('flecha');
        flecha.classList.toggle("fa-caret-down");
        flecha.classList.toggle('fa-caret-up');
    }
}

document.querySelector('.dropbtn').onclick = function (event) {
    event.stopPropagation(); // Evitar que el evento llegue al window.onclick
    toggleDropdown();
};

window.onclick = function (event) {
    let dropdownContent = document.querySelector(".dropdown-content");
    if (dropdownContent && !event.target.matches('.dropbtn')) {
        if (dropdownContent.classList.contains('show')) {
            dropdownContent.classList.remove('show');
            let flecha = document.getElementById('flecha');
            flecha.classList.remove('fa-caret-up');
            flecha.classList.add('fa-caret-down');
        }
    }
};