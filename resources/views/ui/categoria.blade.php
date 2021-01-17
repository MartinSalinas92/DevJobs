@foreach ($categorias as $item)

<ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="{{route('categoria.show', $item->id)}}">{{$item->nombre}}</a>
    </li>

  </ul>

@endforeach
