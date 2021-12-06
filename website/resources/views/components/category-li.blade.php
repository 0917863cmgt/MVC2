@props(['children', 'parent'])
@foreach($children as $category)
    @if($category->parent_id == $parent->id)
        <li tabindex=0>
            <a class="n-t-d" href="/news/?category={{$category->slug}}&{{http_build_query(request()->except('category', 'page'))}}">{{$category->name}}</a>
        </li>
    @endif
@endforeach
