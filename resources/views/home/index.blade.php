@extends("layout.app")
@section("contenido")

<div class="mx-3 my-3">
        
    <div class="row">
        <div class="col-md-6">
            @livewire("chat-form")
        </div>
        <div class="col-md-6">
            @livewire("chat-list")
        </div>
    </div>
    
</div>

@endsection("contenido")