<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=9">
        <title></title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="/js/jquery.min.js"></script>


    </head>
    <body>
        <div id="popup-success" class="answerPopup">
            <form method="GET" action="{{URL::route("getQuestions")}}">
                <input type="submit" name="submit" class="success-btn popupButton" value="" />
            </form>
        </div>

        <div id="popup-error" class="answerPopup">
            <form method="GET" action="{{URL::route("getQuestions")}}">
                <input type="submit" name="submit" class="error-btn popupButton" value="" />
            </form>
        </div>
        <div id="wrapper">
            <header>
                <nav>
                    <ul>
                        <li><a href="{{URL::route('home')}}">НАЧАЛО</a></li>
                        <li><a href="{{URL::route('rules')}}">ПРАВИЛА</a></li>
                        <li><a href="{{URL::route('awards')}}">НАГРАДИ</a></li>
                        <li><a href="{{URL::route('winners')}}">ПОБЕДИТЕЛИ</a></li>
                        <li><a href="{{URL::route('conditions')}}">УСЛОВИЯ</a></li>
                    </ul>
                </nav>
            </header>
            @yield('content')
            <footer>
                <section class="footer-navigation">
                    <ul>
                        <li><a href="{{URL::route('home')}}">НАЧАЛО</a></li>
                        <li><a href="{{URL::route('rules')}}">ПРАВИЛА</a></li>
                        <li><a href="{{URL::route('awards')}}">НАГРАДИ</a></li>
                        <li><a href="{{URL::route('winners')}}">ПОБЕДИТЕЛИ</a></li>
                        <li><a href="{{URL::route('conditions')}}">УСЛОВИЯ</a></li>
                    </ul>
                </section>
                <section id="companys-info">
                    <div class="company-creator footer-text">
                        <a href="http://beshared.bg/">дизайн и изработка: www.beshared.bg </a>
                    </div>
                    <div class="company-application footer-text">
                        <a href="http://cinegrand.bg/">www.cinegrand.bg </a>
                    </div>
                </section>
            </footer>


        </div> <!-- wrapper -->
		@if(Auth::check() && Auth::user()->isAdmin)
		<center><a style="color:#fff; padding:15px; background:skyblue; border-radius:5px; text-decoration:none;" href='{{URL::route("getAdminHome")}}'>Администрация</a></center>
		@endif
			
    </body>
</html>