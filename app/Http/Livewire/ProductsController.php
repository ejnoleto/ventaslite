<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ProductsController extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $name, $barcode, $cost, $price,
        $stok, $alerts, $image, $category_id,
        $search, $selected_id, $componentName,
        $pageTitle;

    private $pagination = 10;

    protected $listeners = ['deleteRow' => 'Destroy'];

    public function render()
    {
        if (strlen($this->search) > 0)
            $products = Product::join('categories as c', 'c.id', 'products.category_id')
                ->select('products.*', 'c.name as category')
                ->where('products.name', 'like', '%' . $this->search . '%')
                ->orWhere('products.barcode', 'like', '%' . $this->search . '%')
                ->orWhere('c.name', 'like', '%' . $this->search . '%')
                ->orderBy('products.name', 'asc')
                ->paginate($this->pagination);
        else
            $products = Product::join('categories as c', 'c.id', 'products.category_id')
                ->select('products.*', 'c.name as category')
                ->orderBy('products.name', 'asc')
                ->paginate($this->pagination);

        return view('livewire.products.components', [
            'data' => $products,
            'categories' => Category::orderBy('name', 'asc')->get()
        ])->extends('layouts.theme.app')
            ->section('content');
    }

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Products';
    }

    public function Store()
    {
        $rules = [
            'name' => 'required|unique:products|min:3',
            'cost' => 'required',
            'price' => 'required',
            'stok' => 'required',
            'alerts' => 'required',
            'category_id' => 'required'
        ];
        $messages = [
            'name.required' => 'Nombre de la produto es requerido.',
            'name.unique' => 'Ya existe nobre de la produto',
            'name.min' => 'El nobre de la produto debe tener al menos 3 caracteres',
            'cost.required' => 'Valor de la Custo es requerido.',
            'cost.min' => 'El valor de la Custo debe tener al menos 3 caracteres',
            'price.required' => 'Price de la produto es requerido.',
            'price.min' => 'El nobre de la produto debe tener al menos 3 caracteres',
            'stok.required' => 'Valor de la produto es requerido.',
            'stok.min' => 'El valor de la produto debe tener al menos 3 caracteres',
            'alert.required' => 'Nombre de la produto es requerido.',
            'alert.min' => 'El nobre de la produto debe tener al menos 3 caracteres',
            'alerts.required' => 'Nombre de la produto es requerido.',
            'alerts.min' => 'El nobre de la produto debe tener al menos 3 caracteres',
            'name.required' => 'Nombre de la produto es requerido.',
            'name.min' => 'El nobre de la produto debe tener al menos 3 caracteres'
        ];

        $this->validate($rules, $messages);

        $products = Product::create([
            'name' => $this->name,
            'cost' => $this->cost,
            'price' => $this->price,
            'barcode' => $this->barcode,
            'stok' => $this->stok,
            'alerts' => $this->alerts,
            'category_id' => $this->category_id

        ]);

        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            // não coloca storage aqui pois vai ficar sem salvar a imagem
            $this->image->storeAs('public/products/', $customFileName);
            $products->image = $customFileName;
            $products->save();
        }

        $this->resetUI();
        $this->emit('product-added', 'Produto Registrado');
    }

    public function resetUI()
    {
        $this->name = '';
        $this->image = null;
        $this->search = '';
        $this->selected_id = 0;
        $this->barcode = '';
        $this->cost = '';
        $this->price = '';
        $this->stok = '';
        $this->alerts = '';
    }

    public function Edit($id)
    {
        $products = Product::find($id, ['id', 'name', 'barcode', 'cost', 'price', 'stok', 'alerts', 'category_id', 'image']);
        $this->name = $products->name;
        $this->barcode = $products->barcode;
        $this->cost = $products->cost;
        $this->price = $products->price;
        $this->stok = $products->stok;
        $this->alerts = $products->alerts;
        $this->category_id = $products->category_id;
        $this->selected_id = $products->id;
        $this->image = null;
        $this->emit('show-modal', 'show modal!');
    }

    public function Update()
    {
        $rules = [
            'name' =>  'required|min:3,unique:products,name{$this->selected_id}',
            'cost' => 'required',
            'price' => 'required',
            'stok' => 'required',
            'alerts' => 'required',
            'category_id' => 'required'
        ];

        $messages = [
            'name.required' => 'Nombre de la produto es requerido.',
            'name.min' => 'El nobre de la produto debe tener al menos 3 caracteres',
            'cost.required' => 'Valor de la Custo es requerido.',
            'cost.min' => 'El valor de la Custo debe tener al menos 3 caracteres',
            'price.required' => 'Price de la produto es requerido.',
            'price.min' => 'El nobre de la produto debe tener al menos 3 caracteres',
            'stok.required' => 'Valor de la produto es requerido.',
            'stok.min' => 'El valor de la produto debe tener al menos 3 caracteres',
            'alert.required' => 'Nombre de la produto es requerido.',
            'alert.min' => 'El nobre de la produto debe tener al menos 3 caracteres',
            'alerts.required' => 'Nombre de la produto es requerido.',
            'alerts.min' => 'El nobre de la produto debe tener al menos 3 caracteres',
            'name.required' => 'Nombre de la produto es requerido.',
            'name.min' => 'El nobre de la produto debe tener al menos 3 caracteres'
        ];

        $this->validate($rules, $messages);

        $products = Product::find($this->selected_id);
        $products->update([
            'name' => $this->name,
            'cost' => $this->cost,
            'price' => $this->price,
            'barcode' => $this->barcode,
            'stok' => $this->stok,
            'alerts' => $this->alerts,
            'category_id' => $this->category_id
        ]);

        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            // não coloca storage aqui pois vai ficar sem salvar a imagem
            $this->image->storeAs('public/products/', $customFileName);
            $imageName = $products->image;

            $products->image = $customFileName;
            $products->save();

            if ($imageName != null) {
                if (file_exists('storage/products' . $imageName)) {
                    unlink('storage/products' . $imageName);
                }
            }
        }
        $this->resetUI();
        $this->emit('product-updated', 'Produto Atualizado');
    }

    public function Destroy(Product $products)
    {
        $imageName = $products->image;
        $products->delete();

        if ($imageName != null) {
            unlink('storage/products/' . $imageName);
        }
        $this->resetUI();
        $this->emit('products-deleted', 'produto deletado com sucesso.');
    }
}
