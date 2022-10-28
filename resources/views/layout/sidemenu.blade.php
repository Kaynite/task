<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
    id="#kt_aside_menu" data-kt-menu="true">
    <div class="menu-item">
        <div class="menu-content pb-2">
            <span class="menu-section text-muted text-uppercase fs-8 ls-1">Dashboard</span>
        </div>
    </div>

    <x-menu-item :title="__('admin.homepage')" :active="request()->routeIs('home')" :url="route('home')" icon="home" />
    <x-menu-item :title="__('admin.clients')" :active="request()->routeIs('clients.*')" :url="route('clients.index')" icon="group" />
    <x-menu-item :title="__('admin.products')" :active="request()->routeIs('products.*')" :url="route('products.index')" icon="r-grid" />
    <x-menu-item :title="__('admin.invoices')" :active="request()->routeIs('invoices.*')" :url="route('invoices.index')" icon="s" />
</div>
