<table class="table table-bordered">
    <thead class="bg-info">
        <tr>
            <th class="text-white">Name</th>
            <th class="text-white">Price</th>
            <th class="text-white">Qty</th>
            <th class="text-white">Sub Total</th>
            <th class="text-white">Action</th>
        </tr>
    </thead>
    <tbody id="body">
        @php
            $cartContent=Cart::content()
        @endphp
        @foreach ($cartContent as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->price}}</td>
                <td>
                <form action="{{url('/update-product/'.$item->rowId)}}" method="post">
                    @csrf
                        <input style="width:50px" type="number" value="{{$item->qty}}" name="qty">
                        <button type="submit" style="margin-top: -5px" class="btn btn-primary btn-sm"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </form>
                </td>
                <td>{{$item->price * $item->qty}}</td>
                <td><a href="{{url('/delete-item/'.$item->rowId)}}" class="btn btn-danger btn-sm"><span> <i class="fa fa-trash" aria-hidden="true"></i></span></a></td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="pricing-header bg-success" >
    <h3 class="text-white mt-2">Total Product: {{Cart::count()}}</h3>
    <h2 class="text-white">Sub Total: {{Cart::subtotal()}} Tk</h2>
    <h1 class="text-white">Vat: {{Cart::tax()}} Tk</h1>
    <span class="price">Total: {{Cart::total()}} Tk</span>
</div>
























{{-- <tr>
    <td>{{$data['name']}}</td>
    <td>{{$data['price']}}</td>
    <td>
    <form action="{{url('/update-product/'.$data['rowId'])}}" method="post">
        @csrf
            <input style="width:50px" type="number" value="{{$data['qty']}}" name="qty">
            <button type="submit" style="margin-top: -5px" class="btn btn-primary btn-sm"><i class="fa fa-check" aria-hidden="true"></i></button>
        </form>
    </td>
    <td>{{$data['qty'] * $data['price']}}</td>
    <td><a href="{{url('/delete-item/'.$data['rowId'])}}" class="btn btn-danger btn-sm"><span> <i class="fa fa-trash" aria-hidden="true"></i></span></a></td>
</tr> --}}

