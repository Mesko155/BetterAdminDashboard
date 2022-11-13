<x-layout>
    @include('partials._header')
    <h1>Practices</h1>

    <div>
        <form action="/practices/create" method="GET">
        <button>Create new practice</button>
        </form>
    </div>

    <div>
        @if($practices)
        <ul>
        @foreach($practices as $practice)
            <li>
            <x-practice-card :practice="$practice"/>

            <form action="/practices/{{$practice->id}}/edit">
                <button>Edit</button>
            </form>

            <form action="/practices/{{$practice->id}}" method="POST">
                <button>Delete</button>
                @csrf
                @method('DELETE')
            </form>
            </li>       
        @endforeach
        </ul>

        @else
            {{'No practices registered!'}}
        @endif
    </div>
    <div>
        {{$practices->links()}}
    </div>
</x-layout>