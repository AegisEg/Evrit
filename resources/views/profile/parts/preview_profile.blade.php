<div class="position-relative img_div">
    <img src="{{$user->avatar}}" class="cart-img" alt="">
    <img src="{{$user->avatar}}" class="cart-img-bg" alt="">
</div>
<span class="nic_name">{{$user->name}}</span>, <?php echo date('Y', (time() - strtotime($user->birthday))) - 1970 ?>
<p class="py-1 my-0"><i class="location_ico pl-1 fa fa-street-view"></i>{{$user->city->name}}</p>
<a href="{{route('profile.show',['id'=>$user->id])}}" class="stretched-link"></a>