@extends('adminlte::page')

@section('title', 'User manager')

@section('content_header')
@stop

@section('content')
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Username</th>
      <th scope="col">Role</th>
      <th scope="col">Status</th>
      <th scope="col">Block</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->role->name}}</td>
      <td>
        @if($user->block==false)
            <p class="d-inline-block p-2 border border-success text-success">Dang hoat dong</p>
            @else
            <p class="d-inline-block p-2 border border-warning text-warning">da bi khoa</p>
        @endif</td>
      <td>
          <form action="{{route('blockManager', ['user' => $user])}}" method="POST">
              @csrf
              @if($user->block==false)
              <button class="btn btn-danger" type="submit">block</button>
              @else
              <button class="btn btn-warning" type="submit">unblock</button>
              @endif

          </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop