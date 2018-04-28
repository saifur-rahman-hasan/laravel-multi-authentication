<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-users position-left"></i><span class="text-semibold">{{ $title or 'Untitled Page Header' }}</span></h4>
        </div>

        <div class="heading-elements">
            <a href="{{ route('admin.users.create') }}" class="btn btn-xs bg-blue heading-btn">
                @if(request()->has('role'))
                    @switch(request()->role)
                        @case('admin')
                            Create admin
                            @break

                        @case('service-provider')
                            Create service provider
                            @break

                        @case('customer')
                            Create customer
                            @break

                        @default
                            Create Customer
                    @endswitch
                @endif
            </a>
        </div>
    </div>

    <div class="breadcrumb-line">
        {{-- <ul class="breadcrumb">
            <li><a href="#"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">Users List</li>
        </ul> --}}

        <ul class="breadcrumb-elements">
            {{-- <li><a href="#"><i class="icon-comment-discussion position-left"></i> Link</a></li> --}}
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-users position-left"></i>
                    Users Types
                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="{{ route('admin.users.index', [ 'role' => 'admin' ]) }}"><i class="icon-user-lock"></i> Admin Users</a></li>
                    <li><a href="{{ route('admin.users.index', [ 'role' => 'service-provider' ]) }}"><i class="icon-user-check"></i> Service Providers</a></li>
                    <li><a href="{{ route('admin.users.index', [ 'role' => 'customer' ]) }}"><i class="icon-user"></i> Customers</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('admin.users.create') }}"><i class="icon-gear"></i> Create new user</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>