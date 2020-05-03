<div class="col-md-12">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        {{-- <li class="nav-item">
            <a class="nav-link active" id="pay-mobile" data-toggle="tab" href="#mobile" role="tab" aria-controls="mobile" aria-selected="true">
                <img src="{{ asset('file/image/mobile-money.png') }}" style="height: 24px;">
                Payement mobile money
            </a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link active" id="pay-visa" data-toggle="tab" href="#visa" role="tab" aria-controls="visa" aria-selected="false">
                <img src="{{ asset('file/image/visa-mastercard.png') }}" style="height: 24px;">
                Payement par carte visa
            </a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        {{-- <div class="tab-pane fade show active" id="mobile" role="tabpanel" aria-labelledby="pay-mobile">

            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

            <p class="text-center mt-3">
                <button type="submit" class="btn btn-teal btn-rounded w-md waves-effect waves-light w-50" id="PaymentBtnSycapay">
                    <i class="mdi mdi-cart"></i>
                    Payer maintenant
                </button>
            </p>

        </div> --}}
        <div class="tab-pane show active" id="visa" role="tabpanel" aria-labelledby="pay-visa">

            <div class="row">

                <div class="col-12 text-center mb-3">
                    <p class="bg-custom text-white p-2" id="PaymentMsgStripe" style="border-radius: 5px 5px 0px 0px;">
                        Veuillez renseigner les références de votre carte de crédit
                    </p>
                </div>
                <div class="col-md-2 text-center">
                    <img src="{{ asset('/file/image/carte-credit.png') }}" style="height: 38px;">
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" size="20" autocomplete="off" class="form-control text-center" id="StripeDataNumber" placeholder="ex : 4242 4242 4242 4242" required="">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <select class="form-control text-center" id="StripeDataMonth" required="">
                            <?php
                            for ($i=1; $i <= 12 ; $i++) {
                                echo '<option>'.sprintf('%02d', $i).'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <select class="form-control text-center" id="StripeDataYear" required="">
                            <?php
                            for ($i=0; $i <= 10 ; $i++) {
                                echo '<option>'.date('Y', time()+($i*360*24*60*60)).'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="text" autocomplete="off" class="form-control text-center" id="StripeDatCvc" placeholder="CVC" required="">
                    </div>
                </div>

            </div>

            {{-- <p class="text-center mt-3">
                <button type="submit" class="btn btn-teal btn-rounded w-md waves-effect waves-light w-50" id="PaymentBtnStripe">
                    <i class="mdi mdi-cart"></i>
                    Payer maintenant
                </button>
            </p> --}}

        </div>
    </div>
</div>
