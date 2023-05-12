<h1>Panier</h1>

@foreach ($carts as $itemCart)

<ul>
    <li>
        Produits :
        {{$itemCart->product_id}}
    </li>
    <li>
        Quantite :
        {{$itemCart->quantite}}
    </li>
    <li>
        Prix :
        {{$itemCart->price}} €
    </li>


</ul>

@endforeach
