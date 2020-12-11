<div class="pricing-header bg-success" id="cartUpdate">
    <h3 class="text-white mt-2">Total Product: {{$cartCount}}</h3>
    <h2 class="text-white">Sub Total: {{$cartTotal}} Tk</h2>
    <h1 class="text-white">Vat: {{Cart::tax()}} Tk</h1>
    <span class="price">Total: {{$cartTotal}} Tk</span>
</div>
