@extends('layouts.admin')

@section('header')
@push('css')
<link href="{{URL::to('css/style.css') }}" rel="stylesheet">

@endpush
@endsection
@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="ContacteImage" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
    <h2>Vous pouvez nous <br> contacter </h2>
    {{-- <a href="#" class="btn-get-started">Get Started</a> --}}
    </div>
</section>
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="row mt-5">

        <div class="col-lg-4">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>92 Tunis, 7000</p>
            </div>

            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>rihabmechergui@gmail.com</p>
            </div>

            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Call:</h4>
              <p>+216  55 000 000</p>
            </div>

          </div>

        </div>

        <div class="col-lg-8 mt-5 mt-lg-0">

          <form id="form_contact" >
            <h3 class="title">Contact </h3>
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="input" id="name" placeholder="name" placeholder="Your Name" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" name="email" class="input"   placeholder="email" id="email">
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="tel" name="phone" class="input" placeholder="Telephone" id="phone" >
            </div>
            <div class="form-group mt-3">
              <textarea name="message" class="input" placeholder="Message" id="message"></textarea>
            </div>
            <div class="my-3">

            </div>
            <div class="text-center">
                <button type="submit" value="Envoyer" class="get-started-btn-contact"  style="color:#FFFF" >Envoyer message

                </button></div>
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
       emailjs.send("service_7on4pfn", "template_jo772w9", {
    form_name: name+' '+email,
      form_email: 'mecherguirihab4@gmail.com',
      message:name+' '+email+' : '+message
     }).then((res)=>{console.log(res)
        if(res.status === 200) {
            let successMessage = document.createElement("div");
            successMessage.innerHTML = "Votre message a été envoyé avec succès !";
            successMessage.style.backgroundColor = "teal";
            successMessage.style.color = "white";
            successMessage.style.padding = "10px";
            successMessage.style.margin = "10px 0";
            form_contact.appendChild(successMessage);
            document.getElementById("name").value = "";
            document.getElementById("message").value = "";
            document.getElementById("phone").value = "";
            document.getElementById("email").value = "";
        }

    });
  });




  </script>
    </div>
  </div>



        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->
@endsection
