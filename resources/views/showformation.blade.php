
@extends('layouts.admin')

@section('header')
@push('css')
<link href="{{URL::to('css/style.css') }}" rel="stylesheet">
<style type="text/css">
        .container {
            margin-top: 40px;
        }
        .panel-heading {
        display: inline;
        font-weight: bold;
        }
        .flex-table {
            display: table;
        }
        .display-tr {
            display: table-row;
        }
        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 55%;
        }
    </style>
@endpush
@endsection

@section('content')
<section id="training" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
    <h2>Notre formations disponible<br></h2>
    {{-- <h2>Nous vous aidons à trouver la formation idéale ! .</h2> --}}
    {{-- <a href="#" class="btn-get-started">Get Started</a> --}}
    </div>
</section>
<main id="main">


    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="course-details">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-8">
            <img src="{{asset('public/'.$formation->image) }}" class="img-fluid" style="height:350px; width:450px;" alt="">
            <h3>{{$formation->titre}}</h3>
          </div>
          <div class="col-lg-4">
            <div class="course-info d-flex justify-content-between align-items-center">
              <h5><strong>Titre</strong></h5>
              <p >{{$formation->titre}}</p>
            </div>
            <div class="course-info d-flex justify-content-between align-items-center">
              <h5> <strong>Mots clés</strong></h5>
              <p>{{$formation->motcle}}</p>
            </div>
            <div class="course-info d-flex justify-content-between align-items-center">
              <h5><strong>Prix</strong></h5>
              <p>{{$formation->prix}}</p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5><strong>Public</strong></h5>
              @if ($formation->public=='1')
              <p>oui</p>
                @else
              <p>non</p>

              @endif
            </div>
            @if ($formation->public=='1')
            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>  </h5>
            {{-- <p><a href="{{route('admin.evenements.inscription',$annonce->id)}}">inscription</a></p> --}}
            @if($formationinscription?->etat =='payé')
              <a href="{{url('showformationpartie/'.$formation->id)}}">Voir formation</a>
              @else
              @auth
              <button type="button" class="get-started-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Paiement
              </button>
              @endauth
              @endif
            </div>
            @endif
<!-- Button trigger modal -->
          </div>
        </div>
      </div>
    </section><!-- End Cource Details Section -->


  </main>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">insciption</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- <form  action="{{ route('admin.formation.inscriptionstoreformation') }}" method="POST"  enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <label class="control-label"> vouler vous s'incrire  </label>
                    <select class="form-control"  name="formation_id" autocomplete="type">
                        <option value="{{ $formation->id }}">{{ $formation->titre }}</option>
                </select>
                </div>
                    <div class="row" style="display: none;">
                        <input class="form-check-input" type="text" name="user_id" value="{{ Auth::user()?->id ? Auth::user()->id : '' }}" >
                    </div>
        </div> -->
        <form role="form" method="POST" id="paymentForm" action="{{ route('formation.payement')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="username">Nom</label>
                                    <input type="text" class="form-control" name="fullName" placeholder="Full Name">
                                </div>
                                <div class="form-group">
                                    <label for="cardNumber">Numéro de la carte</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="cardNumber" placeholder="Card Number" maxlength="16">
                                        <div class="input-group-append">
                                            <span class="input-group-text text-muted">
                                            <i class="fab fa-cc-visa fa-lg pr-1"></i>
                                            <i class="fab fa-cc-amex fa-lg pr-1"></i>
                                            <i class="fab fa-cc-mastercard fa-lg"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label><span class="hidden-xs">
                                                Expiration</span> </label>
                                            <div class="input-group">
                                                <select class="form-control" name="month">
                                                    <option value="">MM</option>
                                                    @foreach(range(1, 12) as $month)
                                                        <option value="{{$month}}">{{$month}}</option>
                                                    @endforeach
                                                </select>
                                                <select class="form-control" name="year">
                                                    <option value="">YYYY</option>
                                                    @foreach(range(date('Y'), date('Y') + 10) as $year)
                                                        <option value="{{$year}}">{{$year}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label data-toggle="tooltip" title=""
                                                data-original-title="3 digits code on back side of the card">CVV <i
                                                class="fa fa-question-circle"></i></label>
                                            <input type="number" class="form-control" placeholder="CVV" name="cvv">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="display: none;">
                        <input class="form-check-input" type="text" name="user_id" value="{{ Auth::user()?->id ? Auth::user()->id : '' }}" >
                    </div>
                    <div class="row" style="display: none;">
                    <label class="control-label"> Vouler vous s'incrire  </label>
                    <select class="form-control"  name="formation_id" autocomplete="type">
                        <option value="{{ $formation->id }}">{{ $formation->titre }}</option>
                </select>
                    </div>
                    <div class="course-info d-flex justify-content-between align-items-center" style="display: none;">
                      <h5 style="display: none;">Prix</h5>
                     <input style="display: none;" class="form-check-input" type="text" name="amount" value="{{$formation->prix}}" >
                    </div>
                                <button class="get-started-btn "  type="submit"> Confirmer </button>
                            </form>
      </div>



                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="/javascripts/jquery-3.1.1.min.js"></script>
    <script type="text/javascript">

    $(function() {

        /*------------------------------------------
        --------------------------------------------
        Stripe Payment Code
        --------------------------------------------
        --------------------------------------------*/

        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]',
                             'input[type=text]', 'input[type=file]',
                             'textarea'].join(', '),
            $inputs = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
              var $input = $(el);
              if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault();
              }
            });

            if (!$form.data('cc-on-file')) {
              e.preventDefault();
              Stripe.setPublishableKey($form.data('stripe-publishable-key'));
              Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
              }, stripeResponseHandler);
            }

        });

        /*------------------------------------------
        --------------------------------------------
        Stripe Response Handler
        --------------------------------------------
        --------------------------------------------*/
        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];

                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });
    </script>

      </div>
    </div>
  </div>
@endsection
