<div>
    @if(session('message'))
        <div class="alert alert-success my-4 {{request()->routeIs('home.show') ? '' : 'text-white'}}">{{session('message')}}</div>
        @endif
</div>
