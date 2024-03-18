document.addEventListener('DOMContentLoaded', function () {
    const SignUp = document.getElementById('SignUp');

    const emailValid = (email) => {
       const emailRegex = /^([A-Za-z0-9_\-.])+@([A-Za-z0-9_\-.])+\.([A-Za-z]{2,4})$/;
       return emailRegex.test(email.toLowerCase());
    };
    function validateForm() {
        const uname = document.getElementById('uname').value;
        const email = document.getElementById('email').value;
        const psw = document.getElementById('psw').value;

        
        if (uname === "" || email === "" || psw === "") {
            alert("Please fill in all the fields.");
            return false;
         }
         if (!emailValid(email)) {
            alert("Please enter a valid email.");
            document.getElementById('email').focus();
            return false;
         }
         const myUrl = "login.html";
         window.location.href = myUrl;

         return true;
      }

      SignUp.addEventListener('click', validateForm);


}
);