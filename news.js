document.addEventListener("DOMContentLoaded", function () {
    let slideIndex = 0;
    showSlides();
  
    function showSlides() {
      let slides = document.getElementsByClassName("slide");
      for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > slides.length) { slideIndex = 1 }
      slides[slideIndex - 1].style.display = "block";
      setTimeout(showSlides, 3000);
    }
  });

  
  document.addEventListener('DOMContentLoaded', function () {
    const BtnSubmit = document.getElementById('BtnSubmit');


    function validateForm() {
        const Data = document.getElementById('Data').value;
        const Titulli = document.getElementById('Titulli').value;
        const Description = document.getElementById('Description').value;
        const Autori = document.getElementById('Autori').value;


        
        if (Data === "" || Titulli === "" || Description === "" || Autori === "") {

            alert("Please fill in all the fields.");
            return false;
         }
      

      BtnSubmit.addEventListener('click', validateForm);

        }

}
);