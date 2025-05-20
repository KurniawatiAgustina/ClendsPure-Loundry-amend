@if (auth()->user()->role == 'Superadmin')
<x-sidebar-dashboard>
    <x-sidebar-menu-dashboard routeName="dashboard.dashboard" title="Dashboard" icon="tabler:chart-pie-filled"/>
    <x-sidebar-menu-dashboard routeName="dashboard.user.index" title="Pengguna" icon="tabler:user-filled"/>
    <x-sidebar-menu-dropdown-diff-dashboard icon="tabler:report-money" parentPattern="dashboard.order*" title="Pesanan" :activeRoutes="['dashboard.order.active','dashboard.customer.index','dashboard.order.index','dashboard.online-order.*']">
        <x-sidebar-menu-dashboard routeName="dashboard.customer.index" title="Customer" />
        <x-sidebar-menu-dashboard routeName="dashboard.online-order.new" title="Pesanan Online Baru"/>
        <x-sidebar-menu-dashboard routeName="dashboard.order.active" title="Pesanan Berlangsung"/>
        <x-sidebar-menu-dashboard routeName="dashboard.order.index" title="Riwayat Pesanan"/>
        <x-sidebar-menu-dashboard routeName="dashboard.online-order.index" title="Riwayat Pesanan Online"/>
    </x-sidebar-menu-dropdown-diff-dashboard>
    <x-sidebar-menu-dropdown-dashboard routeName="dashboard.service*" title="Manage Layanan" icon="tabler:clipboard-list">
        <x-sidebar-menu-dropdown-item-dashboard routeName="dashboard.service.index" title="Layanan"/>
        <x-sidebar-menu-dropdown-item-dashboard routeName="dashboard.service-promotion.index" title="Promo"/>
    </x-sidebar-menu-dropdown-dashboard>
    <x-sidebar-menu-dropdown-dashboard routeName="dashboard.display*" title="Landing Page" icon="tabler:settings">
        <x-sidebar-menu-dropdown-item-dashboard routeName="dashboard.display-promo.index" title="Display Promo"/>
        <x-sidebar-menu-dropdown-item-dashboard routeName="dashboard.display-service.index" title="Display Service"/>
        <x-sidebar-menu-dropdown-item-dashboard routeName="dashboard.display-timeline.index" title="Display Timeline"/>
    </x-sidebar-menu-dropdown-dashboard>
    <x-sidebar-menu-dropdown-diff-dashboard icon="tabler:settings" parentPattern="dashboard.payment-method*" title="Pengaturan" :activeRoutes="['dashboard.payment-method.index','dashboard.branch.index','dashboard.article.index']">
        <x-sidebar-menu-dashboard routeName="dashboard.payment-method.index" title="Metode Pembayaran" />
        <x-sidebar-menu-dashboard routeName="dashboard.branch.index" title="Cabang" />
        <x-sidebar-menu-dashboard routeName="dashboard.article.index" title="Artikel" />
    </x-sidebar-menu-dropdown-diff-dashboard>
</x-sidebar-dashboard>
@elseif (auth()->user()->role == 'Admin')
<x-sidebar-dashboard>
    <x-sidebar-menu-dashboard routeName="dashboard.dashboard" title="Dashboard" icon="tabler:chart-pie-filled"/>
    <x-sidebar-menu-dashboard routeName="dashboard.user.index" title="Pengguna" icon="tabler:user-filled"/>
    <x-sidebar-menu-dashboard routeName="dashboard.customer.index" title="Pelanggan" icon="tabler:user-filled"/>
    <x-sidebar-menu-dashboard routeName="dashboard.order.active" title="Pesanan Berlangsung" icon="tabler:report-money"/>
    <x-sidebar-menu-dashboard routeName="dashboard.order.index" title="Riwayat Pesanan" icon="tabler:report-money"/>
    <x-sidebar-menu-dashboard routeName="dashboard.online-order.new" title="Pesanan Online Baru" icon="tabler:report-money"/>
    <x-sidebar-menu-dashboard routeName="dashboard.online-order.index" title="Riwayat Pesanan Online" icon="tabler:report-money"/>
    <x-sidebar-menu-dashboard routeName="dashboard.payment-method.index" title="Metode Pembayaran" icon="tabler:file-dollar"/>
    <x-sidebar-menu-dashboard routeName="dashboard.service.index" title="Layanan" icon="tabler:clipboard-list"/>
    <x-sidebar-menu-dashboard routeName="dashboard.service-promotion.index" title="Promo" icon="tabler:clipboard-list"/>
</x-sidebar-dashboard>
@elseif (auth()->user()->role == 'Owner')
<x-sidebar-dashboard>
    <x-sidebar-menu-dashboard routeName="dashboard.dashboard" title="Dashboard" icon="tabler:chart-pie-filled"/>
    <x-sidebar-menu-dashboard routeName="dashboard.order.active" title="Pesanan Berlangsung" icon="tabler:report-money"/>
    <x-sidebar-menu-dashboard routeName="dashboard.order.income" title="Riwayat Pemasukan" icon="tabler:report-money"/>
    <x-sidebar-menu-dropdown-diff-dashboard icon="tabler:report-money" parentPattern="dashboard.orderhistory*" title="Riwayat Pesanan" :activeRoutes="['dashboard.order.index','dashboard.online-order.index']">
        <x-sidebar-menu-dashboard routeName="dashboard.order.index" title="Offline" />
        <x-sidebar-menu-dashboard routeName="dashboard.online-order.index" title="Online" />
    </x-sidebar-menu-dropdown-diff-dashboard>
</x-sidebar-dashboard>
@elseif (auth()->user()->role == 'Cashier')
<x-sidebar-dashboard>
    <x-sidebar-menu-dashboard routeName="dashboard.dashboard" title="Dashboard" icon="tabler:chart-pie-filled"/>
    <x-sidebar-menu-dashboard routeName="dashboard.order.create" title="Kasir" icon="tabler:report-money"/>
    <x-sidebar-menu-dashboard routeName="dashboard.customer.index" title="Pelanggan" icon="tabler:user-filled"/>
    <x-sidebar-menu-dashboard routeName="dashboard.online-order.new" title="Pesanan Online Baru" icon="tabler:report-money"/>
    <x-sidebar-menu-dashboard routeName="dashboard.order.active" title="Pesanan Berlangsung" icon="tabler:report-money"/>
    <x-sidebar-menu-dropdown-diff-dashboard icon="tabler:report-money" parentPattern="dashboard.orderhistory*" title="Riwayat Pesanan" :activeRoutes="['dashboard.order.index','dashboard.online-order.index']">
        <x-sidebar-menu-dashboard routeName="dashboard.order.index" title="Langsung" />
        <x-sidebar-menu-dashboard routeName="dashboard.online-order.index" title="Online" />
    </x-sidebar-menu-dropdown-diff-dashboard>
</x-sidebar-dashboard>
@elseif (auth()->user()->role == 'Customer')
<x-sidebar-dashboard>
    <x-sidebar-menu-dashboard routeName="dashboard.online-order.create" title="Pesan Sekarang" icon="tabler:clipboard-list"/>
    <x-sidebar-menu-dropdown-diff-dashboard icon="tabler:report-money" parentPattern="dashboard.orderactive*" title="Pesanan Saya" :activeRoutes="['dashboard.order.active','dashboard.online-order.new']">
        <x-sidebar-menu-dashboard routeName="dashboard.order.active" title="Pesanan Berlangsung" />
        <x-sidebar-menu-dashboard routeName="dashboard.online-order.new" title="Pesanan Online Baru" />
    </x-sidebar-menu-dropdown-diff-dashboard>
    <x-sidebar-menu-dropdown-diff-dashboard icon="tabler:report-money" parentPattern="dashboard.orderhistory*" title="Riwayat Pesanan" :activeRoutes="['dashboard.order.index','dashboard.online-order.index']">
        <x-sidebar-menu-dashboard routeName="dashboard.order.index" title="Pesanan"/>
        <x-sidebar-menu-dashboard routeName="dashboard.online-order.index" title="Permintaan" />
    </x-sidebar-menu-dropdown-diff-dashboard>
</x-sidebar-dashboard>
@endif

