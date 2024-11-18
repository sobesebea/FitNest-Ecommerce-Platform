<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/register.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css" />
    <title>FitNest - Register</title>
</head>
<body>
    <div class="register-container">
        <h1>Register for FitNest </h1>
        <form action="../actions/customer_register_action.php" method="post" enctype="multipart/form-data">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="customer_name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="customer_email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="customer_pass" required>
            
            <label for="country">Country:</label>
            <input type="text" id="country" name="customer_country" required>
            
            <label for="city">City:</label>
            <input type="text" id="city" name="customer_city" required>
            
            <label for="contact">Contact:</label>
            <input type="text" id="contact" name="customer_contact" required>
            
            <label for="role">User Role:</label>
            <select id="role" name="user_role" required>
                <option value="1">Customer</option>
                <option value="3">Admin</option>
            </select>
            
            <label for="image">Profile Image:</label>
            <input type="file" id="image" name="customer_image">
            
            <button type="submit">Register</button>

        </form>


        <script>
        const phoneInputField = document.querySelector("#contact");

        
        const phoneInput = window.intlTelInput(phoneInputField, {
            initialCountry: "auto", 
            geoIpLookup: function (callback) {
                fetch('https://ipinfo.io/json', {headers: {'Accept': 'application/json'}})
                    .then(response => response.json())
                    .then(data => callback(data.country))
                    .catch(() => callback('US'));
            },
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js", 
        });

        // Form validation and submission
        document.querySelector('form').addEventListener('submit', function(event) {
            if (!phoneInput.isValidNumber()) {
                alert("Invalid phone number. Please enter a valid phone number.");
                event.preventDefault();
            } else {
                
                const phoneNumber = phoneInput.getNumber(); 
                document.querySelector("#contact").value = phoneNumber; 
            }
        });
    </script>
    </div>
    <!-- <script>src="../js/customer_register.js"</script> -->
</body>
</html>
