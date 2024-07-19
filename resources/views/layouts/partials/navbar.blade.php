@php
    $menus = [
        [
            'label' => 'Beranda',
            'route' => route('admin.dashboard'),
            'active' => Request::routeIs('admin.dashboard'),
        ],
        [
            'label' => 'Kategori Kulit',
            'route' => route('admin.category.index'),
            'active' => Request::routeIs('admin.category.*'),
        ],
        [
            'label' => 'Lakukan & Jangan',
            'route' => route('admin.dos-donts.index'),
            'active' => Request::routeIs('admin.dos-donts.*'),
        ],
        [
            'label' => 'Pertanyaan',
            'route' => route('admin.question.index'),
            'active' => Request::routeIs('admin.question.*'),
        ],
        [
            'label' => 'Artikel',
            'route' => route('admin.article.index'),
            'active' => Request::routeIs('admin.article.*'),
        ],
    ];
@endphp

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @foreach ($menus as $item)
                    <li class="nav-item">
                        <a @class(['nav-link', 'active' => $item['active']]) @if ($item['active']) aria-current="page" @endif
                            href="{{ $item['route'] }}">{{ $item['label'] }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
