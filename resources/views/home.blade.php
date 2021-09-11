@extends('layouts.app')
@section('content')
<div class="container">
    <form class="container form-group " action="">
        <location-component></location-component>
        <category-component></category-component>
        <button class="btn btn-success" type="submit">tim kiem</button> 
        <a class="btn btn-primary" href="{{route('home')}}">bo loc</a>
    </form>
    <div class=" d-flex justify-content-between mt-5" style="flex-wrap: wrap;">
        @foreach($articles as $article)
        <div class="card my-4 " style="width: 20rem;">
            <div class="card-body ">
               <h5 class="card-title">{{$article->title}}
                
                @if($article->vip == true)
                     <span class="text-danger border border-danger p-1 ">vip</span>
                @endif
               </h5>
                <p class="card-text">{{$article->content}}</p>
                <p class="card-text">Id: {{$article->id}}</p>
                
                
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection