<x-layout>
    @auth
    <h1 class="font-bold text-lg">YOUR FINAL PRICE</h1>
    <form action="/record-order/{{$postId}}" method="POST">
        @csrf

        <h2 class="font-bold text-lg"> _ {{$result}} USD _ </h2>
        <h2 class="font-bold text-lg"> for {{$numberOfDays}} day(s) </h2>
        <input name="numberOfDays" type="hidden" value="{{$numberOfDays}}">
        <textarea  type="text" name="comment" placeholder="add your comment for any special request"></textarea>

        <button type="submit" style="background: lightslategray" class="hover:underline">Submit your order</button>
    </form>

    @else
        <h1>YOUR FINAL PRICE</h1>

        <form action="/login-logout" method="POST">
            @csrf

               {{$result}} USD _
            for {{$numberOfDays}} day(s)
            <h1>to complete yor order you need to Login first</h1>
            <button type="submit" style="background: lightslategray" class="hover:underline">Login/Signup</button>

        </form>

    @endauth
</x-layout>
