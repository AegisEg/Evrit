<div class="modal fade" id="edit_account">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Редактирование Личной информации</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('profile.edit') }}" class="row mx-0" method="post">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    <label class="col-12  my-3">
                        <span>
                            Что я могу предложить
                        </span>
                        <select class="selectpicker" data-live-search="true" name="i_sponsor">
                            <option value="null">Не выбранно</option>
                            @foreach($list_i_sponsor as $key=>$i_sponsor)
                            <option value="{{$key}}" {{$data->i_sponsor?$key==$data->i_sponsor['key']?'selected':'':""}}>{{$i_sponsor}}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="col-12  my-3">
                        <span>
                            Чего я ожидаю
                        </span>
                        <select class="selectpicker" data-live-search="true" name="you_sponsor">
                            <option value="null">Не выбранно</option>
                            @foreach($list_you_sponsor as $key=>$you_sponsor)
                            <option value="{{$key}}" {{$data->you_sponsor?$key==$data->you_sponsor['key']?'selected':'':""}}>{{$you_sponsor}}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="col-12  my-3">
                        <span>
                            Цель знакомства
                        </span>
                        <select class="selectpicker" data-live-search="true" name="relationship_goal">
                            <option value="null">Не выбранно</option>
                            @foreach($list_relationship_goal as $key=>$relationship_goal)
                            <option value="{{$key}}" {{$data->relationship_goal?$key==$data->relationship_goal['key']?'selected':'':""}}>{{$relationship_goal}}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="col-12  my-3">
                        <span>
                            Доступен
                        </span>
                        <select class="selectpicker" data-live-search="true" name="availability">
                            <option value="null">Не выбранно</option>
                            @foreach($list_availability as $key=>$availability)
                            <option value="{{$key}}" {{$data->availability?$key==$data->availability['key']?'selected':'':""}}>{{$availability}}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="col-12  my-3">
                        <span>
                            Мой доход
                        </span>
                        <select class="selectpicker" data-live-search="true" name="income_level">
                            <option value="null">Не выбранно</option>
                            @foreach($list_income_level as $key=>$income_level)
                            <option value="{{$key}}" {{$data->income_level?$key==$data->income_level['key']?'selected':'':""}}>{{$income_level}}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="col-12  my-3">
                        <span>
                            Моя информация
                        </span>
                        <textarea class="form-control" name="description" maxlength="255" rows="3">{{$data->description}}</textarea>
                    </label>
                    <label class="col-12  my-3">
                        @foreach($list_hobby as $key=>$hobby)
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="hoobbie-{{$hobby->id}}" name="hobby[{{$hobby->id}}]" @if($data->hobbyRel->contains($hobby->id)) checked @endif>
                            <label class="custom-control-label" for="hoobbie-{{$hobby->id}}">{{$hobby->name}}</label>
                        </div>
                        @endforeach
                    </label>
                    <label class="col-12  my-3">
                        @foreach($list_language as $key=>$language)
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="language-{{$language->id}}" name="language[{{$language->id}}]" @if($data->languageRel->contains($language->id)) checked @endif>
                            <label class="custom-control-label" for="language-{{$language->id}}">{{$language->name}}</label>
                        </div>
                        @endforeach
                    </label>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>