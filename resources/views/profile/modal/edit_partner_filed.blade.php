<div class="modal fade" id="edit_partner">
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
                        Курение
                        </span>
                        <select class="selectpicker" data-live-search="true" name="you_smoking">
                            <option value="null">Не выбранно</option>
                            @foreach($list_smoking as $key=>$smoking)
                            <option value="{{$key}}" {{$data->you_smokingslug?$key==$data->you_smokingslug['key']?'selected':'':""}}>{{$smoking}}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="col-12  my-3">
                        <span>
                        Алкоголь
                        </span>
                        <select class="selectpicker" data-live-search="true" name="you_drink">
                            <option value="null">Не выбранно</option>
                            @foreach($list_drink as $key=>$drink)
                            <option value="{{$key}}" {{$data->you_drinkslug?$key==$data->you_drinkslug['key']?'selected':'':""}}>{{$drink}}</option>
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