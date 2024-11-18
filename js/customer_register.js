
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('registerForm');

    form.addEventListener('submit', function (event) {
        // Prevent form submission if validation fails
        if (!validateForm()) {
            event.preventDefault();
        }
    });

    function validateForm() {
        // Get all input values
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value.trim();
        const country = document.getElementById('country').value.trim();
        const city = document.getElementById('city').value.trim();
        const contact = document.getElementById('contact').value.trim();

        // Regular expressions for validation
        const nameRegex = /^[a-zA-Z\s]{2,}$/; 
        const ashesiEmailRegex = /^[a-zA-Z0-9._%+-]+@ashesi\.edu\.gh$/; // Only Ashesi email addresses allowed
        const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/; 
        const contactRegex = /^\+?\d{7,15}$/; 
        const cityCountryRegex = /^[a-zA-Z\s]+$/; 

        // Validation checks
        if (!nameRegex.test(name)) {
            alert("Please enter a valid name with at least 2 letters.");
            return false;
        }
        if (!ashesiEmailRegex.test(email)) {
            alert("Please enter a valid Ashesi email address (ending with @ashesi.edu.gh).");
            return false;
        }
        if (!passwordRegex.test(password)) {
            alert("Password must be at least 8 characters long and contain at least 1 letter and 1 number.");
            return false;
        }
        if (!cityCountryRegex.test(country)) {
            alert("Please enter a valid country name.");
            return false;
        }
        if (!cityCountryRegex.test(city)) {
            alert("Please enter a valid city name.");
            return false;
        }
        if (!contactRegex.test(contact)) {
            alert("Please enter a valid contact number (10-15 digits, optional + sign).");
            return false;
        }

        return true; 
    }
});
