
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('loginForm');
    
    form.addEventListener('submit', function(event) {
        // Perform validation checks
        if (!validateLoginForm()) {
            event.preventDefault(); 
        }
    });
});

function validateLoginForm() {
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();

    if (!validateEmail(email)) {
        alert('Please enter a valid email address.');
        return false;
    }

    if (!validatePassword(password)) {
        alert('Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number.');
        return false;
    }

    return true; 
}

// Email validation (standard email format with special characters)
function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Password validation (at least 8 characters, one uppercase, one lowercase, one number)
function validatePassword(password) {
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
    return passwordRegex.test(password);
}
