<x-layout>
    @include('partials._header')

    <form action="\practices" method="POST" enctype="multipart/form-data">
    @csrf
    
        <div>
        <label for="name">
                Name of practice:
            </label>
            <input 
                type="text"
                name="name"
                placeholder="Eg. Valley Clinic"
                value="{{old('name')}}"
            />
            @error('name')
                <p>{{$message}}</p>
            @enderror
        </div>
        <br>

        <div>
            <label for="email">
                Email:
            </label>
            <input 
                type="text"
                name="email"
                placeholder="Eg. info@valley.com"
                value="{{old('email')}}"
            />
            @error('email')
                <p>{{$message}}</p>
            @enderror
        </div>
        <br>

        <div>
            <label for="website">
                Website:
            </label>
            <input 
                type="text"
                name="website"
                placeholder="Eg. www.valleyclinic.com"
                value="{{old('website')}}"
            />
            @error('website')
                <p>{{$message}}</p>
            @enderror
        </div>
        <br>

        <div>
            <label for="logo">
                Logo (min 100x100px):
            </label>
            <input 
                type="file"
                name="logo"
            />
            @error('logo')
                <p>{{$message}}</p>
            @enderror
        </div>
        <br>
        
        <label for="fields">Fields of practice:</label>
            <select name="fields[]" size="{{$fields->count()}}" multiple>
                @foreach($fields as $field)           
                    <option value="{{$field->tag}}">{{$field->tag}}</option>
                @endforeach
            </select>
        <br>
        <br>

        <button type="submit">Create Practice</button>
        <button type="reset">Reset form</button>

    </form>
</x-layout>