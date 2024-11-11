function toggleFilterDropdown(dropdownId) {
    const dropdown = document.getElementById(dropdownId)
    dropdown.classList.toggle('hidden')
}

document.addEventListener('click', function (event) {
    const dropdown = document.getElementById('filterDropdown')
    const button = document.getElementById('filterDropdownButton')

    if (!button.contains(event.target) && !dropdown.contains(event.target)) {
        dropdown.classList.add('hidden')
    }
})
