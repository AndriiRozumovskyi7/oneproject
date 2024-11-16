<x-layout>
    <h1>Choose number of days</h1>

    <form action="/calculate/{{$post['id']}}" method="GET">
        @csrf
        <input type="number" name="numberOfDays" placeholder="Number of days" required>
{{--        @foreach($posts as $post)--}}

{{--        <input type="number" name="price" value="{{$post['price']}}" required>--}}
        <h2> Price per each day is: </h2>
        <h2 class="font-bold text-lg"> {{$post['price']}} USD </h2>
{{--        @endforeach--}}

        <button type="submit" style="background: lightslategray" class="hover:underline">Calculate</button>
    </form>
</x-layout>
