@props(['recipe'])
<div style="min-height:602px;max-height: 602px;" class="col-3">
    <a href="/recipe/{{$recipe->slug}}" style="text-decoration: none;color:inherit; max-width: inherit">
        <img src="{{asset('storage/' . $recipe->image) ?: $recipe->image }}" style="max-width: inherit">
        <h3>{{Illuminate\Support\Str::limit($recipe->title,35,"...")}}</h3>
        <p>Amount of people: {{$recipe->amount_people}}</p>
        <p>Description:</p>
        <p>{{Illuminate\Support\Str::limit($recipe->description,200,"...")}}</p>
    </a>
</div>
