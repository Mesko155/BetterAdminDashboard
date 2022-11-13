<x-layout>
    @include('partials._header')

    <form action='/employees/{{$employee->id}}' method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="firstname">
                    Firstname:
                </label>
                <input 
                    type="text"
                    name="firstname"
                    value="{{$employee->firstname}}"
                />
                @error('firstname')
                    <p>{{$message}}</p>
                @enderror
        </div>
        <br>

        <div>
            <label for="lastname">
                    Lastname:
                </label>
                <input 
                    type="text"
                    name="lastname"
                    value="{{$employee->lastname}}"
                />
                @error('lastname')
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
                    value="{{$employee->email}}"
                />
                @error('email')
                    <p>{{$message}}</p>
                @enderror
        </div>
        <br>

        <div>
            <label for="phone">
                    Phone:
                </label>
                <input 
                    type="text"
                    name="phone"
                    value="{{$employee->phone}}"
                />
                @error('phone')
                    <p>{{$message}}</p>
                @enderror
        </div>
        <br>

        <div><p>{{'Currently employed at: ' . $employee->practice->name}}</p></div>
        <div>
        <label for="practice_id">Change employment to:</label>
            <select name="practice_id" size="{{$practices->count()}}">
                @foreach($practices as $practice)           
                    <option value="{{$practice->id}}">{{$practice->name}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <br>

        <button type="submit">Submit changes</button>
        <button type="reset">Reset form</button>


    </form>





</x-layout>