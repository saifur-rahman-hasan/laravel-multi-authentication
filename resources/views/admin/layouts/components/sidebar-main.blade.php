@auth
<div class="sidebar sidebar-main sidebar-fixed">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="#" class="media-left"><img src="{{ asset('assets/images/placeholder.jpg') }}" class="img-circle img-sm" alt=""></a>
                    <div class="media-body">
                        <span class="media-heading text-semibold">{{ auth()->user()->name }}</span>
                        <div class="text-size-mini text-muted">
                            {{ auth()->user()->email }}
                        </div>
                    </div>

                    {{-- <div class="media-right media-middle">
                        <ul class="icons-list">
                            <li>
                                <a href="#"><i class="icon-cog3"></i></a>
                            </li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                    <li><a href="{{ route('admin.home') }}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                    <li>
                        <a href="#">
                            <i class="icon-user-lock"></i> 
                            <span>Administration</span>
                        </a>
                        <ul>
                            <li><a href="{{ route('admin.users.index') }}">All Users</a></li>
                            <li><a href="{{ route('admin.users.create') }}">Add new User</a></li>
                            {{-- <li class="navigation-divider"></li>
                            <li>
                                <a href="#">Categories</a>
                                <ul>
                                    <li><a href="#">All Categories</a></li>
                                    <li><a href="#">Add new category</a></li>
                                </ul>
                            </li> --}}
                        </ul>
                    </li>

                    <li>
                        <a href="#">
                            <i class="icon-user-lock"></i> 
                            <span>Service Categories</span>
                        </a>
                        <ul>
                            <li><a href="{{ route('admin.categories.index') }}">All Categories</a></li>
                            <li><a href="{{ route('admin.categories.create') }}">Add new category</a></li>
                        </ul>
                    </li>

                    <!-- Admin Services -->
                    <li>
                        <a href="#">
                            <i class="icon-user-lock"></i> 
                            <span>Services</span>
                        </a>
                        <ul>
                            <li><a href="{{ route('admin.services.index') }}">All Services</a></li>
                            <li><a href="{{ route('admin.services.create') }}">Add new service</a></li>
                        </ul>
                    </li>

                    <!-- Customer Services -->
                    <li>
                        <a href="#">
                            <i class="icon-user-lock"></i> 
                            <span>Customer Services</span>
                        </a>
                        <ul>
                            <li><a href="#">All customer services</a></li>
                            <li><a href="#">Add new customer service</a></li>
                        </ul>
                    </li>
                    <!-- /main -->

                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
@endauth