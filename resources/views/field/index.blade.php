<x-layout>
    @include('partials._header')
    <h1>Fields of Practice</h1>

    <form action="/fields" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="tag">
                    Fieldname:
                </label>
                <input 
                    type="text"
                    name="tag"
                    placeholder="Eg. Internal Medicine"
                    value="{{old('tag')}}"
                />
                @error('tag')
                    <p>{{$message}}</p>
                @enderror
        </div>
    
        <button type="submit">Add new field</button>
    
    </form>

    <div>
        @if($fields)
        <ul>
        @foreach($fields as $field)
            <li>
            <a href="/fields/{{$field->id}}">{{$field->tag}}</a>

            <form action="/fields/{{$field->id}}/edit">
                <button>Edit name</button>
            </form>

            <form action="/fields/{{$field->id}}" method="POST">
                <button>Delete</button>
                @csrf
                @method('DELETE')
            </form>
            </li>       
        @endforeach
        </ul>

        @else
            {{'No fields registered!'}}
        @endif
    </div>


</x-layout>