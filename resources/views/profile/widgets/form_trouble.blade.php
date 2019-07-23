<div class="modal fade" id="send_trouble" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form class="modal-dialog" method="POST" action="{{route('send_feedback')}}" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Отправить жалобу</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body row mx-0">
                <p class="col-12">К данной жалобе будет привязан адрес страницы, с которой вы ее оставили!</p>
                <textarea name="text" placeholder="Опишите вашу жалобу" class="form-control col-12 px-0"></textarea>
                @if($errors->has('all'))
                <strong class="col-12 text-center" style="color:red;">Введите тест</strong>
                @endif
            </div>
            @csrf
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Отправить</button>
            </div>
        </div>
    </form>
</div>
@if($errors->has('all'))
<script>    
    $('.trouble_send').trigger('click');    
</script>
@endif