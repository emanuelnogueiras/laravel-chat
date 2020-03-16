<div class="mt-3">

    <h3><strong>Últimos 5 mensajes</strong></h3>    

    <div class="card">        
        <div class="card-body">
            @foreach($mensajes as $mensaje)        
                <div>
                    
                    @if($mensaje["recibido"])
                        <div class="alert alert-warning" style="margin-right: 50px;">
                            <strong>{{$mensaje["usuario"]}}</strong><small class="float-right">{{$mensaje["fecha"]}}</small>
                            <br><span class="text-muted">{{$mensaje["mensaje"]}}</span>
                        </div>
                    @else
                        <div class="alert alert-success" style="margin-left: 50px;">
                            <strong>{{$mensaje["usuario"]}}</strong><small class="float-right">{{$mensaje["fecha"]}}</small>
                            <br><span class="text-muted">{{$mensaje["mensaje"]}}</span>
                        </div>
                    @endif
                    
                </div>        
            @endforeach 
        </div>
    </div>    

    <script>
        
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
  
        var pusher = new Pusher('{{env('PUSHER_APP_KEY')}}', {
            cluster: '{{env('PUSHER_APP_CLUSTER')}}',
            forceTLS: true
        });
        
        var channel = pusher.subscribe('chat-channel');
        
        channel.bind('chat-event', function(data) {            
            window.livewire.emit('mensajeRecibido', data);
        });
        
        setTimeout(function(){ window.livewire.emit('solicitaUsuario'); }, 100);
    </script>

</div>
