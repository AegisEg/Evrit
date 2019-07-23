<div class="modal fade" id="edit_about">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Редактирование информации о мне</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('profile.edit') }}" class="row mx-0" method="post">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    <label class="col-12  my-3">
                        <span>
                            Профессия
                        </span>
                        <select class="selectpicker" data-live-search="true" name="profession">
                            <option value="null">Не выбранно</option>
                            @foreach($list_profession as $profession)
                            <option value="{{$profession->id}}" {{$profession->id==$data->profession?'selected':''}} >{{$profession->name}}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="col-12  my-3">
                        <span>
                            Образование
                        </span>
                        <select class="selectpicker" data-live-search="true" name="education">
                        	<option value="null">Не выбранно</option>
                            @foreach($list_education as $key=>$education)
                            <option value="{{$key}}" {{$data->educationslug?$key==$data->educationslug['key']?'selected':'':""}}>{{$education}}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="col-12  my-3">
                        <span>
                            Телосложение
                        </span>
                        <select class="selectpicker" data-live-search="true" name="body_type">
                        	<option value="null">Не выбранно</option>
                            @foreach($list_body_type as $key=>$body_type)
                            <option value="{{$key}}" {{$data->body_typeslug?$key==$data->body_typeslug['key']?'selected':'':""}}>{{$body_type}}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="col-12  my-3">
                        <span>
                            Рост
                        </span>
                        <input class="form-control" type="number" value="{{$data->height}}" name="height">
                    </label>
                    <label class="col-12  my-3">
                        <span>
                            Цвет волос
                        </span>
                        <select class="selectpicker" data-live-search="true" name="color_hair">
                        	<option value="null">Не выбранно</option>
                            @foreach($list_color_hair as $key=>$color_hair)
                            <option value="{{$key}}" {{$data->color_hairslug?$key==$data->color_hairslug['key']?'selected':'':""}}>{{$color_hair}}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="col-12  my-3">
                        <span>
                            Цвет глаз
                        </span>
                        <select class="selectpicker" data-live-search="true" name="color_eye">
                        	<option value="null">Не выбранно</option>
                            @foreach($list_color_eye as $key=>$color_eye)
                            <option value="{{$key}}" {{$data->color_eyeslug?$key==$data->color_eyeslug['key']?'selected':'':""}}>{{$color_eye}}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="col-12  my-3">
                        <span>
                            Религия
                        </span>
                        <select class="selectpicker" data-live-search="true" name="religion">
                        	<option value="null">Не выбранно</option>
                            @foreach($list_religion as $religion)
                            <option value="{{$religion->id}}" {{$religion->id==$data->religion?'selected':''}} >{{$religion->name}}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="col-12  my-3">
                        <span>
                        Семейное положение
                        </span>
                        <select class="selectpicker" data-live-search="true" name="marital_status">
                        	<option value="null">Не выбранно</option>
                            @foreach($list_marital_status as $key=>$marital_status)
                            <option value="{{$key}}" {{$data->marital_statusslug?$key==$data->marital_statusslug['key']?'selected':'':""}}>{{$marital_status}}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="col-12  my-3">
                        <span>
                        Курение
                        </span>
                        <select class="selectpicker" data-live-search="true" name="smoking">
                        	<option value="null">Не выбранно</option>
                            @foreach($list_smoking as $key=>$smoking)
                            <option value="{{$key}}" {{$data->smokingslug?$key==$data->smokingslug['key']?'selected':'':""}}>{{$smoking}}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="col-12  my-3">
                        <span>
                        Алкоголь
                        </span>
                        <select class="selectpicker" data-live-search="true" name="drink">
                        	<option value="null">Не выбранно</option>
                            @foreach($list_drink as $key=>$drink)
                            <option value="{{$key}}" {{$data->drinkslug?$key==$data->drinkslug['key']?'selected':'':""}}>{{$drink}}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="col-12  my-3">
                        <span>
                        Дети
                        </span>
                        <select class="selectpicker" data-live-search="true" name="children">
                        	<option value="null">Не выбранно</option>
                            @foreach($list_children as $key=>$children)
                            <option value="{{$key}}" {{$data->childrenslug?$key==$data->childrenslug['key']?'selected':'':""}}>{{$children}}</option>
                            @endforeach
                        </select>
                    </label>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>