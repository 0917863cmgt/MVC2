@props(['recipe'])
<div class="recipe-list">
    <h5>{{$recipe->title}}</h5>
    <h5 class="recipe-author">{{$recipe->author->username}}</h5>
    @if($recipe->published == 0)
        <form id="{{$recipe->slug}}" method="POST" action="/admin/recipes/published/update/{{$recipe->slug}}" style="margin-right: 10px">
            @csrf
            @method('PATCH')
            <label class="switch" onclick="document.forms['{{$recipe->slug}}'].submit();">
                <input name="published" type="checkbox" id="published">
                <span id="span" class="slider round">Draft</span>
            </label>
            <button type="submit" style="background: 0 0; border: 0; display: none;"></button>
        </form>
    @else
        <form id="{{$recipe->slug}}" method="POST" action="/admin/recipes/published/update/{{$recipe->slug}}" style="margin-right: 10px">
            @csrf
            @method('PATCH')
            <label class="switch" onclick="document.forms['{{$recipe->slug}}'].submit();">
                <input name="published" type="checkbox" id="published" checked>
                <span id="span" class="slider round">Published</span>
            </label>
            <button type="submit" style="background: 0 0; border: 0; display: none;"></button>
        </form>
    @endif
    <a class="n-t-d recipe-edit" href="/admin/recipes/edit/{{$recipe->slug}}">edit</a>
    <form method="POST" action="/admin/recipes/delete/{{$recipe->slug}}">
        @csrf
        @method('DELETE')
        <button class="n-t-d recipe-delete">
            delete
        </button>
    </form>
</div>
<script>
    // let slider = document.getElementById("published")
    // let span = document.getElementById("span")
    // changeValue()
    // function changeValue(){
    //     if(slider.checked == true){
    //         slider.value = 1;
    //         span.innerHTML = "Published";
    //     } else {
    //         slider.value = 0;
    //         span.innerHTML = "Draft";
    //     }
    // }
</script>
