<div class="modal fade" id="edit_person">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Редактирование Личной информации</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('profile.edit') }}" method="post">  
					<input name="_token" type="hidden" value="{{ csrf_token() }}">				
                    <label class="col-md-6 col-12  my-3 orentation_check">
                    <span>
                        Ищу
                    </span>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            @foreach($list_orientation as $key => $orientation)
                            <label class="btn btn-secondary {{$key==$data->orientation['key']?'active':''}}">
                                <input type="radio" name="orientation" id="{{$key}}" value="{{$key}}" autocomplete="off" {{$key==$data->orientation['key']?'checked':''}}>{{$orientation}}
                            </label>                            
                            @endforeach
                        </div>
                    </label>
                    <label class="col-md-6 col-12  my-3 orentation_check">
                        <label for="amount">Возраст супруги:</label>
                        <span id="amount" style="border:0; color:#f6931f; font-weight:bold;">{{$data->last_age}}-{{$data->start_age}}</span>
                        <input type="text" name="start_age" value="{{$data->start_age}}" hidden>
                        <input type="text" name="last_age" value="{{$data->last_age}}" hidden>
                        <div id="slider-range"></div>
                        <script>
                            $(function() {
                                $("#slider-range").slider({
                                    range: true,
                                    min: 18,
                                    max: 80,
                                    values: [{{$data->start_age}}, {{$data->last_age}}],
                                    slide: function(event, ui) {
                                        $("#amount").text(ui.values[1] + "-" + ui.values[0]);
                                        $("input[name=start_age]").val(ui.values[0]);
                                        $("input[name=last_age]").val(ui.values[1]);
                                    }
                                });
                            });
                        </script>
                    </label>
                    <label class="col-md-6 col-12  my-3">
                        <label for="amount">Ник:</label>
                        <input type="text" class="form-control" value="{{$data->name}}" name="name">
                    </label>
                    <label class="col-md-6 col-12  my-3">
                        <span>
                            Дата рождения
                        </span>
                        <input type="text" class="form-control datepicker text-right" placeholder="****-**-**" value="{{$data->birthday}}" name="birthday">
                    </label>
                    <label class="col-md-6 col-12  my-3">
                        <span>
                            Город
                        </span>
                        <select class="selectpicker" data-live-search="true" name="city_id"  title="Выберете город.." required>
                            @foreach($list_cities as $city)
                            <option value="{{$city->id}}" {{$city->id==$data->city_id?'selected':''}} >{{$city->name}}</option>
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