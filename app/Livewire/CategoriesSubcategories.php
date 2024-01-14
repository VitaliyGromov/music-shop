<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;

class CategoriesSubcategories extends Component
{
    public $categories = [];
    public $subcategories = [];
    public $selectedCategory = null;
    public $selectedSubcategory = null;

    public function mount()
    {
        if (!is_null($this->selectedCategory)) {
            $this->subcategories = Subcategory::where('category_id', $this->selectedCategory)->get();
        }
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.categories-subcategories');
    }

    public function updatedSelectedCategory($category)
    {
        if (!is_null($this->selectedCategory)){
            $this->subcategories = Subcategory::where('category_id', $category)->get();
        } else {
            $this->selectedCategory = null;
            $this->subcategories = [];
        }
    }
}
