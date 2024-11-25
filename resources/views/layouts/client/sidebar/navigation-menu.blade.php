<aside
    class="fixed left-0 top-0 z-40 h-screen w-64 -translate-x-full border-r border-gray-200 bg-white pt-14 transition-transform dark:border-gray-700 dark:bg-gray-800 lg:translate-x-0"
    aria-label="Sidenav"
    id="drawer-navigation"
>
    <div class="h-full overflow-y-auto bg-white px-3 py-5 dark:bg-gray-800">
        <ul class="space-y-2">
            <div class="text-normal mb-2 font-bold">Inventory</div>
            <x-sidebar.menu-item
                :route="route('client.index')"
                :icon="'icons.home'"
                :label="'Dashboard'"
            ></x-sidebar.menu-item>

            <x-sidebar.menu-item
                :route="route('client.products.index')"
                :icon="'icons.shopping-cart'"
                :label="'Products'"
            ></x-sidebar.menu-item>

            <x-sidebar.menu-item
                :route="route('client.brands.index')"
                :icon="'icons.label'"
                :label="'Brands'"
            ></x-sidebar.menu-item>

            <x-sidebar.menu-item
                :route="route('client.categories.index')"
                :icon="'icons.folder'"
                :label="'Categories'"
            ></x-sidebar.menu-item>

            <x-sidebar.menu-item
                :route="route('client.suppliers.index')"
                :icon="'icons.truck'"
                :label="'Suppliers'"
            ></x-sidebar.menu-item>

            <x-sidebar.menu-item
                :route="route('client.sales.index')"
                :icon="'icons.shopping-bag'"
                :label="'Sales'"
            ></x-sidebar.menu-item>

            <x-forms.divider />

            <div class="text-normal mb-2 font-bold">Reports</div>
            <x-sidebar.menu-item
                :route="route('client.reports.sales')"
                :icon="'icons.bar-chart'"
                :label="'Sales'"
                target="_blank"
            ></x-sidebar.menu-item>

            <x-forms.divider />
        </ul>
    </div>
</aside>
