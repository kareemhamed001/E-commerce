<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\category;
use \Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;
use phpDocumentor\Reflection\Types\True_;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $category_id;
    public $delete_All=false;

    function deleteCategory($id){

        $this->category_id=$id;
    }

    function deleteAll(){
        $this->delete_All=true;
    }

    function destroyCategory(){
        if ($this->delete_All==true){
            category::truncate();
            File::cleanDirectory('uploads/category');
            $this->deleteAll=false;
            session()->flash('message','All Categories Deleted');
            $this->emit('refreshIndexPage');
            $this->dispatchBrowserEvent('close-modal');

        }else{
            $category= category::find($this->category_id);
            $path='uploads/category'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $category->delete();
            session()->flash('message','category Deleted');
            $this->emit('refreshIndexPage');
            $this->dispatchBrowserEvent('close-modal');
            $this->category_id='';
        }


    }

    public function render()
    {
        $categories=category::orderBy('id','desc')->paginate(10);
        return view('livewire.admin.category.index',['categories'=>$categories]);
    }

}
