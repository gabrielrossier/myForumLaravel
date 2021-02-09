@extends('layout')
@section('content')
    <h1 class="text-center p-5">Themes</h1>
    @forelse ($themes as $theme)

        <div class="row text-center divtitle" data-id="{{$theme->id}}">
            <div class="col-10 text-left">
                {{ $theme->name }}
                <div class="col-10 text-right">
                    {{$theme->topics->count()}}
                </div>
                <hr/>

            </div>
        </div>

        @empty
            <div>Aucune</div>
    @endforelse
@endsection
