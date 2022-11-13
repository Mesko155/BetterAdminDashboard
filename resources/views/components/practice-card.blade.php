@props(['practice'])

<div>
    <h3>
        <a href="/practices/{{$practice->id}}">
            {{$practice->name}}
        </a>
    </h3>
</div>
<div>
    <h5>
        {{'Amount of employees: ' . $practice->employees()->count()}}
    </h5>
    <h5>
        {{'Distinct fields of practice: ' . $practice->fields()->count()}}
    </h5>
</div>