<div class="position-relative image_item">
    <img src="/{{$img->src}}" class="w-100 gallery_img" alt="">
    <div class="shadow_bg">
        <i class="fa fa-eye" data-toggle="modal" data-target="#modal_gallery_{{$img->id}}"></i>
    </div>
    @if($img->user->id==Auth::id())
    <i class="fa fa-trash image_trash" data-id="{{$img->id}}"></i>
    @endif
</div>