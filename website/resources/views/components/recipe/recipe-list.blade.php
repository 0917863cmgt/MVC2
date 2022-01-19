@props(['recipe'])
<div class="recipe-list">
    <h5>{{$recipe->title}}</h5>
    <h5 class="recipe-author">{{$recipe->author->username}}</h5>
    @if($recipe->published == 0)
        <span class="recipe-inactive">Draft</span>
    @else
        <span class="recipe-active">Published</span>
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
