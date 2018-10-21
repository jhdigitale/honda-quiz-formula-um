$('body').one('click', '#loginWithAccessKeyBtn', function () {

    confirmation = angular.element(document.getElementById('vtexIdUI-email-confirmation')).scope();
    fun = confirmation.validateEmail;

    confirmation.validateEmail = function(){

        $.get( "https://admin.leiturinha.com.br/api/v1/VTEX/getUser/?email=" + confirmation.auth.email );
        fun();
    }

});

$('body').one('click', '#classicLoginBtn', function () {

    confirmation = angular.element(document.getElementById('vtexIdUI-classic-login')).scope();
    fun = confirmation.validateEmail;

    confirmation.validateEmail = function(){

        $.get( "https://admin.leiturinha.com.br/api/v1/VTEX/getUser/?email=" + confirmation.auth.email );
        fun();
    }

});

