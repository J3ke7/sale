<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{!! route('admin.category.index') !!}">
                    @lang('text.menu_item_category')
                </a>
            </li>
            <li>
                <a href="{!! route('admin.product.index') !!}">
                    @lang('admin.product')
                </a>
            </li>
            <li>
                <a href="{!! route('admin.user.index') !!}">
                    @lang('admin.user')
                </a>
            </li>
            <li>
                <a href="{!! route('admin.order.index') !!}">
                    @lang('admin.order')
                </a>
            </li>
        </ul>
    </div>
</div>
