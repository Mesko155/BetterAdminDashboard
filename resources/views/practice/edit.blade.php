<x-layout>
    @include('partials._header')


    <h2>Basic practice info</h2>
    <form action="/practices/{{$practice->id}}" method="POST" enctype="multipart/form-data" name="mainform">
        @csrf
        @method('PUT')
    
        <div>
        <label for="name">
                Name of practice:
            </label>
            <input 
                type="text"
                name="name"
                value="{{$practice->name}}"
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
                value="{{$practice->email}}"
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
                value="{{$practice->website}}"
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
        </div>
        
        <h2>Check to keep/add fields of practice:</h2>
        <div>
            @foreach($fields as $field)
                <input type="checkbox" name="fields[]" value="{{$field->tag}}" checked>
                <label for="fields">{{$field->tag}}</label><br>
            @endforeach
    
    
            @foreach($diff as $i)
                <input type="checkbox" name="fields[]" value="{{$i->tag}}">
                <label for="fields">{{$i->tag}}</label><br>
            @endforeach
        </div>    
        
        {{--  --}}
        <h2>Check to remove employees:</h2>
        <div>
            @foreach($practice->employees as $employee)
                <input type="checkbox" name="employees[]" value="{{$employee->id}}">
                <label for="employees">{{$employee->firstname . ' ' . $employee->lastname}}</label><br>
            @endforeach

        {{--  --}}

        <br>
        <div>
            <button type="submit" name="mainform">Save changes</button>
        </div>

    </form>

    
{{-- 
    <h2>Fields of practice</h2>

    <form action="/practices/{{$practice->id}}/edit/detach" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="current"><h3>Current(mark to remove):</h3></label>
            <select name="current[]" size="{{$fields->count()}}" multiple>
                @foreach($fields as $field)           
                    <option value="{{$field->tag}}">{{$field->tag}}</option>
                @endforeach
            </select>
        
        </div>

        <div>
            <button type="submit">Remove marked</button>
        </div>
    </form>

    <form action="/practices/{{$practice->id}}/edit/attach" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            
            <label for="potential"><h3>Applicable(mark to add):</h3></label>
            <select name="potential[]" size="{{$diff->count()}}" multiple>
                @foreach($diff as $i)           
                    <option value="{{$i->tag}}">{{$i->tag}}</option>
                @endforeach
            </select>
        </div>

        <div>
            <button type="submit">Add marked</button>
        </div>
    </form>

    <h2>Employees</h2>
        <div>
            <ul>
                @foreach($practice->employees as $employee)
                    <li><a href="/employees/{{$employee->id}}">{{$employee->firstname}}</a></li>
                @endforeach
            </ul>
        </div>

        <form action="{{route('multiple', ['employee' => $employee])}}" method="POST">
            @csrf
            @method('DELETE')

        
            <div>
                <label for="employee"><h3>Remove multiple employees:</h3></label>
                <select name="employee[]" size="{{$practice->employees->count()}}" multiple>
                    @foreach($practice->employees as $employee)           
                        <option value="{{$employee->id}}">{{$employee->firstname . ' ' . $employee->lastname}}</option>
                    @endforeach
                </select>
            </div>
    
            <div>
                <button type="submit">Remove multiple marked</button>
            </div>
        </form> 

        <br>

        <div>
            <form action="/employees/create">
                <button type="submit">Add employee</button>
            </form>
        </div>
        --}}
        
</x-layout>