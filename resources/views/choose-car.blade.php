<x-layout>
    <h2><strong>AVAILABLE CARS</strong></h2>
    <div style="border:2px solid darkblue">
        @foreach($posts as $post)
            <div style="background-color: deepskyblue; padding:7px; margin:7px;">
                <h3>{{$post['car']}} by {{$post->user->name}}</h3>
                <h4>Price: {{$post['price']}}</h4>
                Description: {{$post['description']}}
                <p>
                    <a href="/form-calculate/{{$post['id']}}" style="background: lightslategray" class="hover:underline">CLICK TO ORDER THIS CAR</a>
                </p>
            </div>
        @endforeach
    </div>

</x-layout>

