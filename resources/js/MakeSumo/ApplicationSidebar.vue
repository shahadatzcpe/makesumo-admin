<template>
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <application-logo></application-logo>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

<!--        &lt;!&ndash; Nav Item - Dashboard &ndash;&gt;-->
<!--        <li class="nav-item active">-->
<!--            <inertia-link class="nav-link" :href="route('dashboard')"><i class="fas fa-fw fa-tachometer-alt"></i>-->
<!--                <span>Dashboard</span></inertia-link>-->
<!--        </li>-->

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Assets</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Asset Components:</h6>
<!--                    <inertia-link class="collapse-item" :href="route('items.index')">Item</inertia-link>-->
                    <inertia-link class="collapse-item" :href="route('asset-sets.index')">Set</inertia-link>
<!--                    <inertia-link class="collapse-item" :href="route('tags.index')">Tag</inertia-link>-->
                </div>
            </div>
        </li>

<!--        &lt;!&ndash; Nav Item - Utilities Collapse Menu &ndash;&gt;-->
<!--        <li class="nav-item">-->
<!--            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">-->
<!--                <i class="fas fa-fw fa-wrench"></i>-->
<!--                <span>Users</span>-->
<!--            </a>-->
<!--            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">-->
<!--                <div class="bg-white py-2 collapse-inner rounded">-->
<!--                    <h6 class="collapse-header">Custom Filters:</h6>-->
<!--                    <inertia-link class="collapse-item" :href="route('users.index')">All user</inertia-link>-->
<!--                    <inertia-link class="collapse-item" :href="route('users.paid-subscribers')">Paid subscribers</inertia-link>-->
<!--                    <inertia-link class="collapse-item" :href="route('users.trail-subscribers')">Trail subscribers</inertia-link>-->
<!--                </div>-->
<!--            </div>-->
<!--        </li>-->

<!--        &lt;!&ndash; Nav Item - Utilities Collapse Menu &ndash;&gt;-->
<!--        <li class="nav-item">-->
<!--            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#mailsubscribers" aria-expanded="true" aria-controls="collapseUtilities">-->
<!--                <i class="fas fa-fw fa-wrench"></i>-->
<!--                <span>Mail subscriber</span>-->
<!--            </a>-->
<!--            <div id="mailsubscribers" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">-->
<!--                <div class="bg-white py-2 collapse-inner rounded">-->
<!--                    <h6 class="collapse-header">Custom Filters:</h6>-->
<!--                    <inertia-link class="collapse-item" :href="route('mails.create')">Send mail</inertia-link>-->
<!--                    <inertia-link class="collapse-item" :href="route('mailing-lists.index')">Mailing list</inertia-link>-->
<!--                    <inertia-link class="collapse-item" :href="route('mailing-lists.subscribers')">Subscribers</inertia-link>-->
<!--                    <inertia-link class="collapse-item" :href="route('mails.index')">Outbox</inertia-link>-->
<!--                </div>-->
<!--            </div>-->
<!--        </li>-->


<!--        &lt;!&ndash; Nav Item - Charts &ndash;&gt;-->
<!--        <li class="nav-item">-->
<!--            <a class="nav-link" href="charts.html">-->
<!--                <i class="fas fa-fw fa-chart-area"></i>-->
<!--                <span>Transactions</span></a>-->
<!--        </li>-->


<!--        &lt;!&ndash; Divider &ndash;&gt;-->
<!--        <hr class="sidebar-divider d-none d-md-block" />-->

<!--        &lt;!&ndash; Sidebar Toggler (Sidebar) &ndash;&gt;-->
<!--        <div class="text-center d-none d-md-inline">-->
<!--            <button class="rounded-circle border-0" id="sidebarToggle"></button>-->
<!--        </div>-->

    </ul>
    <!-- End of Sidebar -->


</template>

<script>
    import ApplicationLogo from '../MakeSumo/ApplicationLogo'
    export default {
        components: {
            ApplicationLogo
        }
    }
</script>
