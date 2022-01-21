<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminRecipeController extends Controller
{
    public function index()
    {
        return view('recipes.index', [
            'recipes' => Recipe::all()
        ]);
    }

    public function create()
    {
        return view('recipes.admin-create', [
            'categories' => Category::where('is_parent', '=', 0)->get(),
            'parentCategories' => Category::where('is_parent', true),
            'cuisine' => Category::where('parent_id', 3),
            'course' => Category::where('parent_id', 4),
            'protein' => Category::where('parent_id', 1),
            'vegetables' => Category::where('parent_id', 2),
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'slug' => ['required',Rule::unique('recipes', 'slug'),'string','min:1'],
            'title' => ['required',Rule::unique('recipes', 'slug'),'string','min:1'],
            'description' => 'required|string|min:100',
            'image' => 'required|image',
            'amount_people' => 'required|integer|min:1',
            'ingredients' => 'required|string',
            'steps' => 'required|string',
        ]);

        $attributes2 = request()->validate([
            'category' => 'required|integer',
        ]);
        $attributes['user_id'] = auth()->user()->id;
        $attributes['image'] = request()->file('image')->store('images');
        $attributes['published'] = 0;

        $recipe = Recipe::create($attributes);

        $attributes2['recipe_id'] = $recipe->id;
        $recipe->categories()->attach($attributes2);
//        foreach ($attributes2['categories'] as $attributes3){
//            $attributes3['recipe_id'] = $recipe->id;
//            $recipe->categories()->attach($attributes3);
//        }
        return redirect('/admin/recipes')->with('succes', 'Uw recept is succesvol geplaatst!');
    }
    public function edit(Recipe $recipe){
        return view('recipes.edit', [
            'recipe' => $recipe,
            'recipeCategories' => $recipe->categories,
            'categories' => Category::where('is_parent', '=', 0)->get(),
        ]);
    }
    public function update(Recipe $recipe){
        $attributes = request()->validate([
            'slug' => ['required',Rule::unique('recipes', 'slug')->ignore($recipe->id),'string','min:1'],
            'title' => ['required',Rule::unique('recipes', 'slug')->ignore($recipe->id),'string','min:1'],
            'description' => 'required|string|min:100',
            'image' => 'image',
            'amount_people' => 'required|integer|min:1',
            'ingredients' => 'required|string',
            'steps' => 'required|string',
            'published' => 'integer|min:1'
        ]);

        if(isset($attributes['image'])){
            $attributes['image'] = request()->file('image')->store('recipe_images');
        }

        $recipe->update($attributes);

        return redirect('/admin/recipes')->with('succes', 'Uw recept is succesvol bewerkt!');
    }

    public function destroy(Recipe $recipe){
        $recipe->categories()->detach();
        $recipe->delete();
        return redirect('/admin/recipes')->with('succes', 'Uw recept is succesvol verwijderd!');
    }

    public function published(Recipe $recipe){
        if($recipe->published == 1){
            $attributes['published'] = 0;
        } else {
            $attributes['published'] = 1;
        }

        $recipe->update($attributes);

        return redirect('/admin/recipes')->with('succes', 'Uw recept is succesvol bewerkt!');
    }
}
