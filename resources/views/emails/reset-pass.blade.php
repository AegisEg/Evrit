<p><b>Hello!</b></p>
<p>You are receiving this email because we received a password reset request for your account.</p>
<p><a href="{{route('password.reset',['token'=>$confirmation_link])}}">Reset password</a></p> 
<p>This password reset link will expire in 60 minutes.</p>
<p>If you did not request a password reset, no further action is required.</p>	