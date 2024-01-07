<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoriesSubcategories extends Component
{
    public $categories = null;
    public $subcategories = null;
    public $selectedCategory = null;
    public $selectedSubcategory = null;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.categories-subcategories');
    }

    public function updatedSelectedCategory()
    {

    }

    public function updatedSelectedSubcategory()
    {

    }
}
