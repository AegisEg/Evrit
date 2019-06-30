<div class="row py-3 gallery">
    @foreach($data->gallery as $img)
    <div class="col-3 d-flex image_conteiner align-items-center">
        @include('profile.parts.preview_image')
        <div class="modal modal_gallery col-12 col-sm-10 col-md-8 mx-auto fade" id="modal_gallery_{{$img->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog w-100" role="document">
                <div class="image_area">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <img src="/{{$img->src}}" class="modal_img" alt="">
                    <p class="description_image">
                        {{$img->description}}
                    </p>
                    <div class="d-block icons mt-3">
                        <span class="pl-3 to_like @if($img->user_likes->contains(Auth::id())) active @endif" data-id="{{$img->id}}"><i class="fa fa-heart"></i>
                            <div class="count_likes">{{$img->user_likes->count()}}</div>
                        </span>
                        <span><i class="fa fa-flag"></i></span>
                    </div>
                </div>
                <div class="comments_img">
                    <i class="fa fa-comments pink float-left py-2"></i>
                    <div class="comments_list">
                        @foreach($img->comments as $comment)
                        @include('profile.parts.comment')
                        @endforeach
                    </div>
                    @if(Auth::check()&&!$is_you_ignore&&!$is_ignore)
                    <form class="form_comment" data-id="{{$img->id}}" class="py-4 text-right">
                        <textarea name="text" class="form-control" placeholder="Введите коментарий"></textarea>
                        <button class="free_reg mt-3 ">Отправить</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="col-3">
        <div class="position-relative">
            <img src="/images/add-icon-image.png" class="w-100" alt="">
            <div class="shadow_bg" data-toggle="modal" data-target="#create_new">
            </div>
        </div>
        <div class="modal modal_gallery col-12 col-sm-10 col-md-6 mx-auto fade" id="create_new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog w-100" role="document">
                <form class="form_newimage row" method="POST" action="{{route('profile.image_save')}}" enctype="multipart/form-data">
                    <h4 class="col-12 text-right my-3">Новое фото</h4>
                    <div class="input-group col-8 my-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="src" name="src" accept="image/x-png,image/gif,image/jpeg" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label text-left" for="src">Выберете фаил</label>
                        </div>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Загрузка</span>
                        </div>
                    </div>
                    <div class="d-block col-8 my-3">
                        <label for="discription">Описание</label>
                        <textarea class="form-control" id="discription" rows="3"></textarea>
                    </div>
                    <div class="col-8  my-3">
                        <span>
                            Кому будет видно
                        </span>
                        <select class="selectpicker" name="confidentiality">
                            <option value="0">Всем</option>
                            <option value="1">Только друзьям</option>
                        </select>
                    </div>
                    @csrf
                    <div class="col-8  my-3">
                        <button class="free_reg">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>