@extends('adminlte::page')

@section('title', 'Article manager')

@section('content_header')
@stop

@section('content')
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Content</th>
      <th scope="col">Display status</th>
      <th scope="col">Vip status</th>
      <th scope="col">Vip</th>
      <th scope="col">Display</th>
    </tr>
  </thead>
  <tbody>
    @foreach($articles as $article)
    <tr>
        <!-- ID -->
        <th scope="row">{{$article->id}}</th>
        <!-- TITLE -->
        <td>{{$article->title}}</td>
        <!-- CONTENT -->
        <td>{{$article->content}}</td>
        <!-- DISPLAY STASTUS -->
        <td>
        @if($article->hidden)
            <p class="d-inline-block p-2 border border-danger text-danger">da bi an</p>
            @else
            <p class="d-inline-block p-2 border border-success text-success">dang hien thi</p>
        @endif
        </td>
        <!-- VIP STATUS -->
        <td>
        @if($article->vip)
            <p class="d-inline-block p-2 border border-success text-success">vip</p>
            @else
            <p class="d-inline-block p-2 border border-secondary text-secondary">no vip</p>
        @endif
        </td>
        <!-- VIP -->
        <td>  
          <form action="{{route('vipManager', ['article' => $article])}}" method="POST">
              @csrf
              @if($article->vip)
              <button class="btn btn-secondary" type="submit">delete vip</button>
              @else
              <button class="btn btn-info" type="submit">set vip</button>
              @endif
          </form>
        </td>
        <td>  
            <!-- DISPLAY -->
          <form action="{{route('displayManager', ['article' => $article])}}" method="POST">
              @csrf
              @if($article->hidden)
              <button class="btn btn-success" type="submit">hien thi</button>
              @else
              <button class="btn btn-danger" type="submit">an</button>
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