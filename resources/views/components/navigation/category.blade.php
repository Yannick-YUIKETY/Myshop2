<div class="header-nav header-nav-line header-nav-top-line header-nav-top-line-with-border justify-content-start"
data-sticky-header-style="{'minResolution': 991}"
data-sticky-header-style-active="{'margin-left': '105px'}"
data-sticky-header-style-deactive="{'margin-left': '0'}">

<div class="header-nav-main header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-3 header-nav-main-sub-effect-1 w-100">

    <nav class="collapse w-100">
        <ul class="nav nav-pills w-100" id="mainNav">

            @forelse ($categories as $itemCategorie)

            <li class="dropdown">
                <a class="dropdown-item dropdown-toggle" href="{{route('welcome.categorie',$itemCategorie)}}">
                    {{$itemCategorie->name}}
                </a>

            </li>
            @empty
                <li>Pas de catégories</li>
            @endforelse

        </ul>
    </nav>
</div>
<button class="btn header-btn-collapse-nav" data-bs-toggle="collapse"
    data-bs-target=".header-nav-main nav">
    <i class="fas fa-bars"></i>
</button>
</div>
