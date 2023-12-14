 
<div class="form">
    <div class="contact-info">
      <h5 class="title"> Bienvenue sur notre réseau de développeurs</h5>
      <p class="text">

C'est une application web formant un réseau pour les développeurs contenant un espace
forum permettant ces développeurs à discuter entre eux différents sujets.
Ainsi que des annonces de recrutement
ou création d'une application .

      </p>

      <div class="info">
        <div class="information">
          <img src="img/location.png" class="icon" alt="" />
          <p>92 Tunis, 7000</p>
        </div>
        <div class="information">
          <img src="img/email.png" class="icon" alt="" />
          <p>rihabmechergui@gmail.com</p>
        </div>
        <div class="information">
          <img src="img/phone.png" class="icon" alt="" />
          <p>52-000-400</p>
        </div>
      </div>

      <div class="social-media">
        <p>Contacter nous  :</p>
        <div class="social-icons">
          <a href="#">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="#">
            <i class="fab fa-linkedin-in"></i>
          </a>
        </div>
      </div>
    </div>

    <div class="contact-form">
      <span class="circle one"></span>
      <span class="circle two"></span>

      <form id="form_contact" >
        <h3 class="title">Contact </h3>
        <div class="input-container">
          <input type="text" name="name" class="input" id="name" placeholder="name" />
        </div>
        <div class="input-container">
          <input type="email" name="email" class="input"   placeholder="email" id="email" />
        </div>
        <div class="input-container">
          <input type="tel" name="phone" class="input" placeholder="Telephone" id="phone" />

        </div>

        <div class="input-container textarea">
          <textarea name="message" class="input" placeholder="Message" id="message"></textarea>
        </div>
        <input type="submit"  value="Envoyer"  class="get-started-btn-contact"  style="color: #808080" />
      </form>
      <script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
</script>
<script type="text/javascript">
   (function(){
      emailjs.init("1kymcehFzZuVZ2VrC");
   })();
   let form_contact=document.getElementById("form_contact");
   document.getElementById('form_contact').addEventListener('submit', function(evt){
    evt.preventDefault();
    let name=document.getElementById("name").value;
     let message=document.getElementById("message").value;
     let phone=document.getElementById("phone").value;
     let email=document.getElementById("email").value;
     emailjs.send("service_ypnlhyd", "template_jo772w9", {
form_name: name+' '+email,
    form_email: 'mecherguirihab4@gmail.com',
    message:name+' '+email+' : '+message
   }).then((res)=>{console.log(res)});
})




</script>
    </div>
  </div>

