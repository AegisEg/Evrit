<button onclick="send();">Send</button>
<script>
    var conn= new WebSocket('ws://192.168.10.10:8080');
    conn.onopen=function(e)
    {
        console.log("Connection established!");
    }
    conn.onmessage=function(e)
    {
        console.log("Получены данные:"+e.data);
    }
    function send()
    {
        var data="Данные для отправки:"+Math.random();
        conn.send(data);
        console.log('Sended:' +data);
    }
</script>