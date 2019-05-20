<header>
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #fc5e3f;"> 
        <a class="navbar-font ml-3" href="/">Cookin home</a>
         
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    <li class="nav-item text-right">{!! link_to_route('users.index', '全て・お気に入りユーザー', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item dropdown text-right">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item">{!! link_to_route('users.show', 'プロフィール', ['id' => Auth::id()]) !!}</li>
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