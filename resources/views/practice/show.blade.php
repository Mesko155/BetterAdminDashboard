<x-layout>
    @include('partials._header')

    @if($practice->logo)
        <div>
            <img src="{{asset('storage/'. substr($practice->logo, 6))}}" alt=""/>
        </div>
    @endif

    <div>
        <h2>{{$practice->name}}</h2>
        <h3>{{'Website: '}}</h3><a href="{{$practice->website}}">{{$practice->website}}</a>
        <h3>{{'Contact at: '}} <a href="mailto: {{$practice->email}}">{{$practice->email}}</a></h3>
    </div>

    <div>
        <h3>Fields of practice:</h3>
        @foreach($practice->fields as $field)
        <ul>
            <li>
                <a href="/fields/{{$field->id}}">{{$field->tag}}</a>
            </li>
        </ul>
        @endforeach
    </div>

    <div>
        <h3>Employees:</h3>
        @foreach($practice->employees as $employee)
        <ul>
            <li>
            <a href="/employees/{{$employee->id}}"> {{$employee->firstname . ' ' . $employee->lastname}}</a>
            </li>
        </ul>
        @endforeach
    </div>

    <div>
        <form action="/practices/{{$practice->id}}/edit">
            <button>Edit</button>
        </form>
        
        <form action="/practices/{{$practice->id}}" method="POST">
            <button>Delete</button>
            @csrf
            @method('DELETE')
        </form>   
    </div>
</x-layout>