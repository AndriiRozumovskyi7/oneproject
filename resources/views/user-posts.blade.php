<x-layout>
@auth
    <div style="border: 2px solid darkblue">
        <h1>Add your car</h1>
        <form action="/add-car" method="POST">
            @csrf
            <input  name="car" type="text" placeholder="add car">
            <input name="price" type="number" placeholder="price">
            <textarea name="description" placeholder="car description"></textarea>
            <button style="background: lightslategray" class="hover:underline">Save</button>
        </form>
    </div>
        <div style="border:3px solid dodgerblue">
            <h2>All cars</h2>
            @foreach ($posts as $post)
                <div style="background-color: deepskyblue; padding:7px; margin:7px;">
                    <h3>{{$post['car']}} by {{$post->user->name}}</h3>
                    <h4>{{"Price:" . " "}}{{$post['price']}}</h4>
                    {{"Description:" . " "}}{{$post['description']}}
                    <p><a href="/edit-post/{{$post->id}}" style="background: lightslategray" class="hover:underline">Edit</a></p>
                    <form action="/delete-post/{{$post->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button style="background: lightslategray" class="hover:underline">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>

    @else
        <h1>TO "CREATE" OR "MODIFY" YOUR POST(S)</h1>
   <h1>YOU NEED TO LOGIN FIRST</h1>

    @endauth
</x-layout>
