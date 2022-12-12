<div class="sidenav">
    <div class="bg-light m-2">
        <center>
            <img class="m-2 align-items-center" src="{{url('/').'/images/logo.png'}}" width="80">
            <br>
            <h4 class="text-black p-2">Amarat Materials</h4>
        </center>

    </div>
    <div class="m-3">
        @foreach($nav as $key => $menuItem)
            <p class="text-white" type="button"
               data-bs-toggle="collapse" data-bs-target="#{{ $key}}" aria-expanded="false"
               aria-controls="{{ $key}}">
                <span class="submenu-icon ml-auto">{{ $key}}</span></p>
            <div class="collapse" id="{{ $key}}">
                @foreach($menuItem as $childKey => $child)
                    <a class="text-secondary" href="{{url('/') . '/' . $child }}">{{$childKey}}</a>
                @endforeach
            </div>
        @endforeach

    </div>


</div>
