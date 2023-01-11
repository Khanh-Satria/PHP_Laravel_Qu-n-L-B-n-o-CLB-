<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class OrderTable extends Component
{

    public $selectData=true;
    public $selectDetail=false;
    public $order;
    public $orderDetails;
    public $product;
    public $status_order;
    public $fullname;
    

    

   
    
    public $perPage=3;
    public $search='';
    public function render()
    {
        
        return view('livewire.order-table',[
            'orders' => Order::search($this->search)
            ->paginate($this->perPage),
            
        ]);

        
    }

    public function resetField(){
        $this->status_order='';
    }

    public function detail($id){
        
        $this->selectData= false;
        $this->selectDetail = true;

        
        $this->order = Order::find($id);
        $this->orderDetails = OrderDetail::where('IDorder', $id)->get();
       
    }


    public function update($id){
        
        $order = Order::findOrFail($id);
        $order->status_order = $this->status_order;
        $order->save();

        $this->resetField();
        $this->selectData= true;
        $this->selectDetail =false;
    }
}
