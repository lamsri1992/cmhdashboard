<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="https://cmbis.chiangmaihealth.go.th/web/img/chiangmaihealth.ico" width="30" height="30"
                class="d-inline-block align-top">
            <span class="cm">CM-</span><span class="text-success">DASHBOARD</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/"><i class="fa fa-home"></i> หน้าหลัก</a>
                </li>
                @foreach($menuItems as $item)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                            {{ $item->group_name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left" aria-labelledby="navbarDropdownMenuLink">
                            @foreach($subItems as $subitem)
                                @if($item->group_id == $subitem->sub_group)
                                    <a class="dropdown-item"
                                        href="{{ route('dashboard.show',base64_encode($subitem->sub_id)) }}">
                                        {{ $subitem->sub_name }}
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </li>
                @endforeach
            </ul>
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('login') }}">{{ __('เข้าสู่ระบบ') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa fa-user-circle"></i> {{ Auth::user()->fullname }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if(Auth::user()->dlevel==3)
                                <a class="dropdown-item" href="backend"><i class="fa fa-user-cog"></i>
                                    สำหรับผู้ดูแลระบบ
                                </a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out-alt"></i>
                                {{ __('ออกจากระบบ') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
