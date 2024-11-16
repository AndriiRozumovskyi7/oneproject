<x-layout>
    @auth
        <form class="button" action="/logout" method="POST">
            @csrf
            <button style="background: lightslategray" class="hover:underline">Click to Logout</button>
        </form>

    @else

        <div style="border:2px solid darkblue">
            <h2>Signup</h2>
            <form action="/signup" method="POST">
                @csrf
                <input name="name" type="text" placeholder="name">
                <input name="email" type="text" placeholder="email">
                <input name="password" type="password" placeholder="password">
                <button style="background: lightslategray" class="hover:underline">Signup</button>
            </form>
        </div>

        <div style="border:2px solid darkblue">
            <h2>Login</h2>
            <form action="/login" method="POST">
                @csrf
                <input name="loginname" type="text" placeholder="name">
                <input name="loginpassword" type="password" placeholder="password">
                <button style="background: lightslategray" class="hover:underline">Login</button>
            </form>
        </div>

    @endauth
</x-layout>
