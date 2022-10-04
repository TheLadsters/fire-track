@extends('signUpLayout')

@section('signup-page')

<section class="h-100 my-5">
  <div class="container py-1 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-6">
        <div class="card rounded-5">
          <div class="row d-flex justify-content-center mt-3">
          <img src= "/images/fire_track_final.png"
            class="fireTrackFinal" alt="Fire Track Logo">
          </div>

          <div class="card-body p-4 p-md-5">
            <h3 class="text-center pb-2 pb-md-0 mb-md-5 px-md-2"><b>CREATE AN ACCOUNT</b></h3>

            <form class="px-md-2">

              <div class="row">
                <div class="col-md-6 mb-4">
                    <input type="text" class="form-control form-inputs" id="firstNameInput" placeholder="First Name" />
                </div>

                <div class="col-md-6 mb-4">
                  <input type="text" class="form-control form-inputs" id="firstNameInput" placeholder="Last Name" />
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4">
                    <input type="text" class="form-control form-inputs" id="contactNumberInput" placeholder="Contact Number" />
                </div>

                <div class="col-md-6 mb-4">
                  <input type="text" class="form-control form-inputs" id="emailAddressInput" placeholder="Email Address" />
                </div>
              </div>

  

              <div class="row mb-4 pb-2 pb-md-0 mb-md-3">
                <div class="col-md-12 mb-4">
                    <input type="text" id="homeAddressInput" class="form-control form-inputs" placeholder="Home Address" />
                </div>

                <div class="col-md-12">
                    <input type="password" id="passwordInput" class="form-control form-inputs" placeholder="Password" />
                </div>
              </div>

              <div class="row mb-3 mt-4 genderArea">
                <div class="col-md-2 mb-2">
                  Gender
                </div>

                <div class="col-md-2">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="chooseGender" id="genderMale">
                    <label class="form-check-label" for="chooseGender">
                      Male
                    </label>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="chooseGender" id="genderFemale">
                    <label class="form-check-label" for="chooseGender">
                      Female
                    </label>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <p class="text-center">
                    By clicking Sign Up, you agree to our Terms, Data Policy and Cookies Policy. 
                    You may receive Email Notifications from us and can opt out any time.
                  </p>
                </div>
              </div>


              <button class="btn-signUp btn-block-signup btn-lg mb-1">Sign Up</button>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection