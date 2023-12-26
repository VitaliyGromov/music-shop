<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\View\View;
use Livewire\Component;

class CategorySubcategory extends Component
{
    public $categories = [];
    public $subcategories = [];
    public $selectedCategory = null;
    public $selectedSubcategory = null;

    public function render(): View
    {
        return view('livewire.category-subcategory');
    }

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function updatedSelectedCategory($category): void
    {
        if ($category){
            $this->subcategories = Subcategory::where('category_id', $category)->get();
            $this->selectedSubcategory = null;
        } else {
            $this->selectedCategory = null;
        }
    }
}
