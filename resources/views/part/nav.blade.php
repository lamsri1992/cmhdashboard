<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#"><i class="fa fa-chart-pie"></i> CMH : <small class="text-success"> Dashboard</small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">หน้าหลัก</a>
            </li>
            @foreach ($menuItems as $item)
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{$item->group_name}}
              </a>
              <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="navbarDropdownMenuLink">
                @foreach ($subItems as $subitem)
                @if ($item->group_id == $subitem->sub_group)
                  <a class="dropdown-item" href="{{ route('show',base64_encode($subitem->sub_id))}}">
                      {{$subitem->sub_name}}
                  </a>
                @endif
                @endforeach
              </div>
            </li>
            @endforeach
          </ul>
        </div>
    </div>
</nav>