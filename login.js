function validateForm() {
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    const login = document.getElementById("login");
    const index = document.getElementById("index_1");
    const emailRegex = /^([A-Za-z0-9_\-.])+@([A-Za-z0-9_\-.])+\.([A-Za-z]{2,4})$/;
    const passwordRegex ="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$";


    if (email === emailRegex && password === passwordRegex) {
        if (login) {
            login.style.display = "none";
        }
        if (index) {
            index.style.display = "block";
        }
    }
    else {
        document.getElementById("invalid-username").innerHTML = "Invalid username or password"
        
    }
    

}