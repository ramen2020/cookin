<header>
    <nav class="navbar navbar-expand-sm"> 
        <a class="navbar-brand" id="nav-font" href="/">Cookins</a>
         
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                   <li class="nav-item">{!! link_to_route('users.index', 'Users', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class="dropdown-item">{!! link_to_route('users.show', 'My profile', ['id' => Auth::id()]) !!}</li>
                                <li class="dropdown-item">{!! link_to_route('deliveries.create', '新規出品', ['class' => 'nav-link']) !!}</li>
                                <li class="dropdown-divider"></li>
                                <li class="dropdown-item">{!! link_to_route('logout.get', 'Logout') !!}</li>
                            </ul>
                    </li>
                @else
                    <li class="nav-item">{!! link_to_route('signup.get', '新規登録', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>