<form action="" method="POST">
    <h4>Рассылка</h4>
    <input type="radio" checked name="mail_for" id="customer" hidden value="customer">
    <br>
    <label for="text_message">Текст сообщения</label>
    <textarea name="text_message" id="text_message"></textarea>
    <label for="is_important">Пометка важности</label>
    @csrf
    <input type="checkbox" name="is_important" id="is_important">  
    <button>Отправить</button>
</form>