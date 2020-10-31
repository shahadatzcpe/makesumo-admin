<template>
    <div class="yoo-sidebarheader">
        <div class="yoo-sidebarheader-in" data-scrollbar>
            <div class="yoo-sidebar-nav">
                <ul class="yoo-sidebar-nav-list yoo-mp0">
                    <li>
                        <inertia-link :href="route('dashboard')" >
                          <span class="yoo-sidebar-link-title">
                            <span class="yoo-sidebar-link-icon yoo-style1"><ion-icon name="layers"></ion-icon></span>
                            <span class="yoo-sidebar-link-text">Dashboard</span>
                          </span>
                        </inertia-link>
                    </li>
                    <li>
                        <inertia-link :href="route('asset-sets.create')" >
                             <span class="yoo-sidebar-link-title">
                                <span class="yoo-sidebar-link-icon yoo-style1"><ion-icon name="create"></ion-icon></span>
                                <span class="yoo-sidebar-link-text">Asset Sets</span>
                              </span>
                        </inertia-link>
                    </li>

                    <li>
                        <inertia-link :href="route('assets')" >
                          <span class="yoo-sidebar-link-title">
                            <span class="yoo-sidebar-link-icon yoo-style1"><ion-icon name="create"></ion-icon></span>
                            <span class="yoo-sidebar-link-text">Assets</span>
                          </span>
                        </inertia-link>
                    </li>


                    <li>
                        <inertia-link :href="route('tags')" >
                          <span class="yoo-sidebar-link-title">
                            <span class="yoo-sidebar-link-icon yoo-style1"><ion-icon name="create"></ion-icon></span>
                            <span class="yoo-sidebar-link-text">Tags</span>
                          </span>
                        </inertia-link>
                    </li>

                    <li>
                        <inertia-link :href="route('users')" >
                          <span class="yoo-sidebar-link-title">
                            <span class="yoo-sidebar-link-icon yoo-style1"><ion-icon name="create"></ion-icon></span>
                            <span class="yoo-sidebar-link-text">Users</span>
                          </span>
                        </inertia-link>
                    </li>
                    <li>
                        <inertia-link :href="route('settings')" >
                          <span class="yoo-sidebar-link-title">
                            <span class="yoo-sidebar-link-icon yoo-style1"><ion-icon name="calendar"></ion-icon></span>
                            <span class="yoo-sidebar-link-text">Settings</span>
                          </span>
                        </inertia-link>
                    </li>
                </ul><!-- .yoo-sidebar-nav-list -->
            </div>
        </div>
    </div><!-- .yoo-sidebarheader -->
</template>
