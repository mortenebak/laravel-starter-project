<ul class="py-3 space-y-2 dark:text-white">

    @can('access dashboard')
        <li class="mb-0.5 ">
            <a wire:navigate aria-current="page" class="flex p-2 rounded dark:hover:bg-gray-700 "
               href="{{ route('admin.dashboard') }}">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="dark:text-gray-400 w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                    </svg>
                    <div class="font-medium ml-3 duration-200">
                        {{ __('Dashboard') }}
                    </div>
                </div>
            </a>
        </li>
    @endcan

    @can('view users')
        <li x-data="{expanded : $persist(false).as('menu.view-users')}">
            <a class="cursor-pointer flex p-2 rounded dark:hover:bg-gray-700" @click="expanded = !expanded">
                <div class="flex w-full items-center justify-between">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="dark:text-gray-400 w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                        </svg>
                        <div class="font-medium ml-3 duration-200">
                            {{ __('Users') }}
                        </div>
                    </div>
                    <div class="flex shrink-0 ml-2">
                        <svg
                            class="w-3 h-3 shrink-0 ml-1 fill-current dark:fill-slate-200 text-text transition ease-in-out transform rotate-180"
                            viewBox="0 0 12 12" :class="expanded ? 'rotate-180' : 'rotate-0'">
                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
                        </svg>
                    </div>
                </div>
            </a>

            <div x-show="expanded" x-collapse="">
                <ul class="pl-8 mt-1">
                    <li class="mb-1 last:mb-0">
                        <a wire:navigate.hover
                           class="px-3 py-[2px] block text-text dark:text-slate-200 rounded truncate hover:bg-emerald-300-dark flex rounded dark:hover:bg-gray-700"
                           href="{{ route('admin.users') }}">
                            <div class="text-sm duration-200">
                                {{ __('Users') }}
                            </div>
                        </a>
                    </li>
                    @can('view roles')
                        <li class="mb-1 last:mb-0">
                            <a wire:navigate.hover
                               class="px-3 py-[2px] block text-text dark:text-slate-200 rounded truncate hover:bg-emerald-300-dark flex rounded dark:hover:bg-gray-700"
                               href="{{ route('admin.roles') }}">
                                <div class="text-sm duration-200">
                                    {{ __('Roles') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                    @can('view permissions')
                        <li class="mb-1 last:mb-0">
                            <a wire:navigate.hover
                               class="px-3 py-[2px] block text-text dark:text-slate-200 rounded truncate hover:bg-emerald-300-dark flex2 rounded dark:hover:bg-gray-700"
                               href="{{ route('admin.permissions') }}">
                                <div class="text-sm duration-200">
                                    {{ __('Permissions') }}
                                </div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </div>

        </li>
    @endcan

    @can('view plans')
        <li class="mb-0.5 ">
            <a wire:navigate aria-current="page" class="flex p-2 rounded dark:hover:bg-gray-700 "
               href="{{ route('admin.plans') }}">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="dark:text-gray-400 w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                    </svg>
                    <div class="font-medium ml-3 duration-200">
                        {{ __('plans.nav-item') }}
                    </div>
                </div>
            </a>
        </li>
    @endcan

</ul>
