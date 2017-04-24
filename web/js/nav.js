function navInitButtons() {
    $('#nav_home').click(function() {
        navOpenHome(this);
    });

    $('#nav_createevent').click(function() {
        navOpenCreateEvent(this);
    });

    $('#nav_myevents').click(function() {
        navOpenMyEvents(this);
    });

    $('#nav_myprofile').click(function() {
        navOpenMyProfile(this);
    });

    $('#nav_contact').click(function() {
        navOpenContact(this);
    });

    $('#nav_signup').click(function() {
        navOpenSignUp();
    });

    $('#nav_signin').click(function() {
        navOpenSignIn();
    });
}

function navRemoveActiveClass() {
    $('header nav ul li').removeClass('active');
}

function navOpenHome(button) {
    navRemoveActiveClass();
    $(button).addClass('active');
    $('#contents').load('pages/home.html');
    navPushState("Accueil", "home");
}

function navOpenCreateEvent(button) {
    navRemoveActiveClass();
    $(button).addClass('active');
    $('#contents').load('pages/createevent.html');
    navPushState("Créer un évenement", "createevent");
}

function navOpenMyEvents(button) {
    navRemoveActiveClass();
    $(button).addClass('active');
    $('#contents').load('pages/myevents.html');
    navPushState("Mes évenements", "myevents");
}

function navOpenMyProfile(button) {
    navRemoveActiveClass();
    $(button).addClass('active');
    $('#contents').load('pages/myprofile.html');
    navPushState("Mon compte", "myprofile");
}

function navOpenContact(button) {
    navRemoveActiveClass();
    $(button).addClass('active');
    $('#contents').load('pages/contact.html');
    navPushState("Contact", "contact");
}

function navOpenSignUp() {
    navRemoveActiveClass();
    $('#contents').load('pages/signup.html');
    navPushState("Inscription", "signup");
}

function navOpenSignIn() {
    navRemoveActiveClass();
    $('#contents').load('pages/signin.html');
    navPushState("Connexion", "signin");
}

function navPushState(title, name) {
    history.pushState(name, "Web evenementiel - " + title, "?page=" + name);
}

$.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null){
        return null;
    }
    else{
        return results[1] || 0;
    }
}

function changePageFromURL() {
    switch ($.urlParam('page')) {
        case 'home':
            navOpenHome($('#nav_home'));
            break;
        case 'createevent':
            navOpenCreateEvent($('#nav_createevent'));
            break;
        case 'myevents':
            navOpenMyEvents($('#nav_myevents'));
            break;
        case 'myprofile':
            navOpenMyProfile($('#nav_myprofile'));
            break;
        case 'contact':
            navOpenContact($('#nav_contact'));
            break;
        case 'signup':
            navOpenSignUp($('#nav_signup'));
            break;
        case 'signin':
            navOpenSignIn($('#nav_signin'));
            break;
        default:
            navOpenHome($('#nav_home'));
            break;
    }
}