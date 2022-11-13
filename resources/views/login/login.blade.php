<x-layout>
    <header>
        <h1>Please login:</h1>
        <h3>Hint: (admin@mail.ba, password)</h3>
    </header>
    <form action="/authenticate" method="POST">
        @csrf
        <div>
            @error('invalid')
                {{$message}}
            @enderror
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email">
            @error('email')
                <p>{{$message}}</p>
            @enderror
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" name="password">
            @error('password')
                <p>{{$message}}</p>
            @enderror
        </div>

        <div>
            <button type="submit">Sign in</button>
        </div>
    </form>
</x-layout>