<x-layout>

<h1>Edit post</h1>
<form action="/edit-post/{{$post->id}}" method="POST">
@csrf
@method('PUT')
<input type="text" name="car" value="{{$post->car}}">
<input type="number" name="price" value="{{$post->price}}">
<textarea name="description">{{$post->description}}</textarea>
<button type="submit" style="background: lightslategray" class="hover:underline">Save changes</button>
</form>

</x-layout>
