document.addEventListener('DOMContentLoaded', function () {
    function handleButtonClick(buttonId) {
        const submitButton = document.getElementById(buttonId)
        if (submitButton) {
            submitButton.addEventListener('click', function () {
                submitButton.disabled = true
                submitButton.closest('form').submit()
            })
        }
    }

    handleButtonClick('loginButton')
    handleButtonClick('registerButton')
    handleButtonClick('logoutButton')
})
