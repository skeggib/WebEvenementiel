function navRemoveActiveClass() {
    $('header nav ul li').removeClass('active');
}

function navOpenHome() {
    navRemoveActiveClass();
    $('#nav_home').addClass('active');
    $('#contents').load('pages/home.html');
    navPushState("Accueil", "home");
    updateConnectedUser();
}

function navOpenCreateEvent() {
    navRemoveActiveClass();
    $('#nav_createevent').addClass('active');
    $('#contents').load('pages/createevent.html');
    navPushState("Créer un évenement", "createevent");
    updateConnectedUser();
}

function navOpenMyEvents() {
    navRemoveActiveClass();
    $("#nav_myevents").addClass('active');
    $('#contents').load('pages/myevents.html');
    navPushState("Mes évenements", "myevents");
    updateConnectedUser();
	LoadEventsList();
}

function navOpenMyProfile() {
    navRemoveActiveClass();
    $('#nav_myprofile').addClass('active');
    $('#contents').load('pages/myprofile.html');
    navPushState("Mon compte", "myprofile");
    updateConnectedUser();
	updateinformation();
}

function navOpenContact() {
    navRemoveActiveClass();
    $('#nav_contact').addClass('active');
    $('#contents').load('pages/contact.html');
    navPushState("Contact", "contact");
    updateConnectedUser();
}

function navOpenSignUp() {
    navRemoveActiveClass();
    $('#contents').load('pages/signup.html');
    navPushState("Inscription", "signup");
    updateConnectedUser();
}

function navOpenSignIn() {
    navRemoveActiveClass();
    $('#contents').load('pages/signin.html');
    navPushState("Connexion", "signin");
    updateConnectedUser();
}

function navOpenEvenement() {
    navRemoveActiveClass();
    $('#contents').load('pages/event.html');
    navPushState("Evenement", "event");
    updateConnectedUser();
}

function navOpenSignUpSuccess() {
    navRemoveActiveClass();
    $('#contents').load('pages/signup_success.html');
    navPushState("Inscription succes", "signup_success");
    updateConnectedUser();
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
		case 'event':
            navOpenEvenement($('#nav_event'));
            break;
        default:
            navOpenHome($('#nav_home'));
            break;
    }
}