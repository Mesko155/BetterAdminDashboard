<x-layout>
    @include('partials._header')

    <form action="\dashboard\employees" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="firstname">
                    Firstname:
                </label>
                <input 
                    type="text"
                    name="firstname"
                    placeholder="Eg. Mezga"
                    value="{{old('firstname')}}"
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
                    placeholder="Eg. Probnic"
                    value="{{old('lastname')}}"
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
                    placeholder="Eg. mezga@mail.ba"
                    value="{{old('email')}}"
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
                    placeholder="Eg. +387 61 247 365"
                    value="{{old('phone')}}"
                />
                @error('phone')
                    <p>{{$message}}</p>
                @enderror
        </div>
        <br>

        <div>
        <label for="practice_id">Works at:</label>
            <select name="practice_id" size="{{$practices->count()}}">
                @foreach($practices as $practice)           
                    <option value="{{$practice->id}}">{{$practice->name}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <br>

        <button type="submit">Create Employee</button>
        <button type="reset">Reset form</button>


    </form>

</x-layout>