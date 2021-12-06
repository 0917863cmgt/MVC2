@props(['recipe'])
<img src="{{$recipe->image}}" style="max-width: inherit; max-height: 400px;margin-bottom: 10px">
<h3 style="margin-bottom: 10px">{{$recipe->title}}</h3>
<p>Amount of people: {{$recipe->amount_people}}</p>
<p>Ingredients:</p>
<p>{{$recipe->ingredients}}</p>
<p>Description:</p>
<p>{{$recipe->description}}</p>
<p>Steps:</p>
<p>{{$recipe->steps}}</p>
