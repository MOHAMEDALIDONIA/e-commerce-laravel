<div>
 <div class="row">
    <div class="col-md-3">
     @if($category->brands )
        <div class="card">
            <div class="card-header">
                <h4>Brands</h4>
            </div>
            @foreach($category->brands as $branditem)
            <div class="card-body">
                <label class="d-block">
                    <input type="checkbox"  wire:model="brandInputs" value="{{$branditem->name}}">{{$branditem->name}}
                </label>
            </div>
            @endforeach

        </div>
     @endif 
        <div class="card mt-3">
            <div class="card-header">
                <h4>Price</h4>
            </div>
            
            <div class="card-body">
                <label class="d-block">
                    <input type="radio" name="priceSort"  wire:model="priceInput" value="high-to-low">High to Low
                </label>
                <label class="d-block">
                    <input type="radio" name="priceSort"  wire:model="priceInput" value="low-to-high">low to high
                </label>
            </div>
            

        </div>
    </div>
    <div class="col-md-9">

 
            <div class="row">
                @forelse ($products as $productitem)
                        
            
                <div class="col-md-4">
                    <div class="product-card">
                        <div class="product-card-img">
                            @if($productitem->quantity > 0)
                            <label class="stock bg-success">In Stock</label>
                            @else
                            <label class="stock bg-danger">Out of Stock</label>
                            @endif 
                            @if($productitem->productImages->count() > 0)
                                <a href="{{url('/collections/'.$productitem->category->slug.'/'.$productitem->slug)}}">
                                <img src="{{asset($productitem->productImages[0]->image)}}" alt="{{$productitem->name}}">
                                </a>
                            @endif
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">{{$productitem->brands}}</p>
                            <h5 class="product-name">
                            <a href="{{url('/collections/'.$productitem->category->slug.'/'.$productitem->slug)}}">
                                {{$productitem->name}}
                            </a>
                            </h5>
                            <div>
                                <span class="selling-price">${{$productitem->selling_price}}</span>
                                <span class="original-price">${{$productitem->original_price}}</span>
                            </div>
                           
                        </div>
                    </div>
                </div>
            @empty
            <div class="col-md-12">
                <div class="p-2">
                    <h4>No Products Available for {{$category->name}}</h4>
                </div>
            </div>
                
            @endforelse

            </div>
  </div>
 </div> 
</div>
