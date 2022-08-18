{{--
    basic model syntad to retrive ID
    --}}
    @extends('layout')

@section('content')
    <h1> {{$heading}} </h1>

    @unless(count($listings) == 0)
    
    @foreach($listings as $listing)
    <h2>
        <a href="/listings/{{$listing['id']}}">
        {{$listing['title']}}</a></h2>
    <h4>{{$listing['description']}}</h5>
    
    @endforeach
    @else 
    <p>No listing found</p>
    @endunless
    @endsection