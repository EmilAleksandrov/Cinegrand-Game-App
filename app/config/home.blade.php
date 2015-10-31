@extends('layouts.master')

@section('content')

        <?php
        require_once __DIR__ . '/../../vendor/autoload.php';
        $fb = new Facebook\Facebook([
            'app_id' => '1620451901505100',
            'app_secret' => 'eba97361583d670e54a197cfccab5cdf',
            'default_graph_version' => 'v2.4',
        ]);

        $helper = $fb->getCanvasHelper();

        try {
            $accessToken = $helper->getAccessToken();
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (!isset($accessToken)) {
            echo 'No OAuth data could be obtained from the signed request. User has not authorized your app yet.';
            exit;
        }

        $token = $accessToken->getValue();

        try {
            // Returns a `Facebook\FacebookResponse` object
            $response = $fb->get('/me?fields=id,name', $token);
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        $user = $response->getGraphUser();
        ?>
        
<section class="register-logo">
    <figure class="annual-voucher">
        <img src="images/Annual-voucher-logo.png" alt="annual-voucher"/>
    </figure>   
    <figure class="sign-up-logo">
        <img src="images/Sign-up-logo.png" alt="sign-up"/>
    </figure>
    <div class="register-form">
        <form method="POST" action="{{URL::route('postCreate')}}">
            {{Form::token()}}
            <div class="input-text-container">
                <input type="text" placeholder="Име:" name="firstname" onchange="checkLoginData()" />
                <input type="text" placeholder="Фамилия:" name="lastname" onchange="checkLoginData()" />
                <input type="text" placeholder="E-mail:" name="email"  onchange="checkLoginData()" />
                <input type="hidden" placeholder="Facebook id..." name="facebook_id" value="<?php echo $user['id']; ?>"/>
            </div> <!-- input-text-container -->
            <div class="register-checkbox-container">
                <input type="checkbox" name="register_agreement" onchange="checkLoginData()"> 
                <p>Съгласен съм с общите условия</p>
            </div> <!-- register-checkbox-container -->
            <div class="register-submit-container">
                <input type="submit" name="submit" class="image-button" value="">
            </div> <!-- register-submit-container -->
        </form>
    </div> <!-- register-form -->
</section>

<script>
    function  checkLoginData() {
        if ($('input[name=firstname]').val() !== '' &&
                $('input[name=lastname]').val() !== '' &&
                $('input[name=email]').val() !== '' &&
                $('input[name=register_agreement]').is(':checked')) {
            $('.image-button').addClass('register-submit-container-active');
        } else {
            $('.image-button').removeClass('register-submit-container-active');
        }
    }
</script>

@stop