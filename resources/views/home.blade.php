<x-layout>
    <h1><strong>LIST OF AVAILABLE CARS</strong></h1>
        <form action="/user-posts" method="POST">
            @csrf
            <button style="background: lightslategray" class="hover:underline">CREATE/MODIFY YOUR POST</button>
        </form>
    <div style="border:2px solid darkblue">
        @foreach($posts as $post)
            <div style="background-color: deepskyblue; padding:7px; margin:7px;">
                <h3>{{$post['car']}} by {{$post->user->name}}</h3>
                <h4>{{"Price:" . " "}}{{$post['price']}}</h4>
                {{"Description:" . " "}}{{$post['description']}}
            </div>
    @endforeach


    </x-layout>
