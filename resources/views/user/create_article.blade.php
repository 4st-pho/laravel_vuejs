@extends('layouts.app')
@section('content')
<form class="form-group container" action="{{route('article.store')}}" method="POST">
    @csrf
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div>
        <label for="">title</label>
        <input value="{{ old('title') }}" type="text" name="title" class="form-control">
    </div>
    <location-component></location-component>
    <category-component></category-component>
    <div >
        <input class="form-control" type="date" name="valid_date" min="{{\Carbon\Carbon::now()->addDay(1)->toDateString()}}" >
    </div>
    <div>
        <label for="">content</label>
       <textarea class="form-control" name="content" id="" cols="30" rows="10" >{{old('content')}}</textarea>
    </div>
    <div>        
        <button  class="btn btn-primary my-2" type="submit" >Gui bai dang</button>
    </div>

</form>
@endsection