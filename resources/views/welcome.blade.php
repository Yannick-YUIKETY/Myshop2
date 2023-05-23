@extends('layouts.myshop')
@section('main')


    <div class="row products product-thumb-info-list" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">

        @forelse ($products as $itemProduct )

        <x-product.card :itemProduct='$itemProduct'/>
        @empty
             no product
        @endforelse

    {{$products->links()}}

    </div>




@endsection()
