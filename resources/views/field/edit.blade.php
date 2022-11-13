<x-layout>
    @include('partials._header')

    <form action='/fields/{{$field->id}}' method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div>
            <label for="tag">
                    Fieldname:
                </label>
                <input 
                    type="text"
                    name="tag"
                    placeholder="Eg. Internal Medicine"
                    value="{{$field->tag}}"
                />
                @error('tag')
                    <p>{{$message}}</p>
                @enderror
        </div>
    
        <button type="submit">Submit edit</button>
    
    </form>


</x-layout>