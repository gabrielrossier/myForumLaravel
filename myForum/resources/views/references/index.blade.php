@extends('layout')
@section('content')
    <h1 class="text-center p-5">Réferences</h1>
    <a href="/references/create" class="btn btn-primary">Créer</a>
    @forelse ($references as $reference)

        <div class="row text-center divtitle" data-id="{{$reference->id}}">
            <div class="col-2 text-right">
                <div id="divIcons{{$reference->id}}" class="d-none">
                    <a class="blacklink m-2" href="{{ $reference->url }}"><i class="fas fa-eye"></i></a>
                    <a class="blacklink m-2" href="{{ route('references.show',$reference->id) }}"><i class="fas fa-search-plus"></i></a>
                </div>
            </div>
            <div class="col-10 text-left">
                {{ $reference->description }}
                <br/>
                {{ $reference->url }}




            </div>
            <div class="col-10 text-right">
                {{$reference->opinions->count()}}
                <a class="btn btn-primary" href="{{ route('references.show',$reference->id) }}"><i class="fas fa-search-plus"></i>Détails</a>
            </div>

        </div>
        <hr/>
        @empty
            <div>Aucune</div>
    @endforelse
@endsection
