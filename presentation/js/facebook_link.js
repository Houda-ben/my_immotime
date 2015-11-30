 window.fbAsyncInit = function () {
  FB.init({
    appId: '441510359372411',
    status: true,
    cookie: true,
    xfbml: true
  });
};

(function (doc) {
  var js;
  var id = 'facebook-jssdk';
  var ref = doc.getElementsByTagName('script')[0];
  if (doc.getElementById(id)) {
    return;
  }
  js = doc.createElement('script');
  js.id = id;
  js.async = true;
  js.src = "https://connect.facebook.net/en_US/all.js";
  ref.parentNode.insertBefore(js, ref);
}(document));

function Login() {
  FB.login(function (response) {
    if (response.authResponse) {
      FB.api('/me', {fields:'name,email'},function(response) {
  document.getElementById("email").innerHTML = response.email;
  document.getElementById("name").innerHTML = response.name;
});

    }
     
  }, { scope: 'email,user_photos,publish_actions' });
} 

