@extends('public.layout.main')

@php
$page = 'services';
$title = 'Méthode de paiement';
@endphp

@section('content')
    <main>
        <div class="container" style="margin-top: 40px; margin-bottom: 70px">
            <h3>Comment souhaitez vous payer ?</h3>
            <div class="row">
                <div class="col-md-6">
                    <button class="pay-btn">
                        <b>Payer cash au studio</b> <br>
                        <hr>
                        <p>Après une semaine la reservation sera automatiquement annulée</p>
                    </button>
                </div>
                <div class="col-md-6">  
                    <form action="https://api.maxicashapp.com/PayEntryPost" method="POST">
                        <input type="hidden" name="PayType" value="MaxiCash">
                        <input type="hidden" name="Amount" value="2000">
                        <input type="hidden" name="Currency" value="MaxiDollar">
                        <input type="hidden" name="Telephone" value="0814063056">
                        <input type="hidden" name="Email" value="danielmwemakapwe@gmail.com">

                        <input type="hidden" name="MerchantID" value="fa206ebcf8fc4686ba4f271847238c15">
                        <input type="hidden" name="MerchantPassword" value="beddc523074a4d5b8431bce664d6cbbd">
                        <input type="hidden" name="Language" value="Fr">
                        <input type="hidden" name="Reference" value="1234">
                        <input type="hidden" name="accepturl" value="{SUCCESS_URL}">
                        <input type="hidden" name="cancelurl" value="{CANCEL_URL}">
                        <input type="hidden" name="declineurl" value="{FAILURE_URL}">
                        <input type="hidden" name="notifyurl" value="{NOTIFY_URL}">
                        <button class="pay-btn">
                            <b>Payer en ligne</b> <br>
                            <hr>
                            <p>Confirmer la réservation en payant en ligne par carte de crédit ou par mobile money </p>
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </main>
@endsection

@section('style')
    <style>
        .pay-btn p {
            margin: 0
        }

        .pay-btn {
            padding: 0 40px;
            border: none;
            border-radius: 5px;
            margin-bottom: 20px;
            height: 150px;
            background-color: rgb(243, 243, 243);
            border: 1px solid transparent;
        }

        .pay-btn:hover {
            border: 1px solid rgb(173, 173, 173);
            box-sizing: border-box
        }

    </style>
@endsection
