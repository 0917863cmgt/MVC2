<div style="max-width: 200px;margin: 0;">
    <form method="GET" action="#">
        @if(request('category'))
            <input type="hidden" name="category" placeholder="" value="{{request('category')}}">
        @endif
        <input type="text" name="search" placeholder="Search..." class="article-searchbar">
    </form>
</div>
