<h5>Hi, {{$user->full_name}}</h5>
<a href="{{URL::signedRoute('user.verify', ['invitation_token' => $user->invitation_token])}}">Visit your site</a>
