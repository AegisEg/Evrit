<script src="{{ asset('js/autobahn.min.js')}}"></script>
<button onclick="send();">Send</button>
<script>
    var conn = new ab.connect(
        'ws://192.168.10.10:8080',
        function(session) {
            session.subscribe('onNewData', function(topic, data) {
                console.info("New data:topic_id: " + topic);
                console.log(data.data);
            });
            session.subscribe('onNewData1', function(topic, data) {
                console.info("New data1:topic_id: " + topic);
                console.log(data.data);
            });
        },
        function(code, reason, detail) {
            console.warn('WebSocket connection closed: code=' + code + '; reason=' + reason + '; detail=' + detail);
        }, {
            'maxRetries': 60,
            'retryDelay': 400,
            'skipSubprotocolCheck': true
        }
    );
</script>