@extends('layout')
@section('content')
<h1 class="text-center p-5">Create Reference</h1>

<form method="POST" action="/references/store">
    {{ csrf_field() }}
    <input class="form-control" name = "description" id="description" type="text" placeholder="Description"/>
    <input class="form-control" name = "url" id="url" type="text" placeholder="URL"/>
    <input class="btn btn-success" type="submit" value="Create"/>
</form>



