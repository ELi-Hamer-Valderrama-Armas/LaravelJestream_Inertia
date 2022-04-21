<template>
  <div>
    <jet-banner />

    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': ishowingNavigationDropdown }"
    >
      <!-- Desktop sidebar -->
      <aside
        class="z-20 w-64 hidden md:block overflow-y-auto bg-white dark:bg-gray-800 flex-shrink-0"
      >
        <div class="py-4 text-gray-500 dark:text-gray-400">
          <button
            class="active:bg-transparent inline-flex focus:outline-none ml-2 px-2 text-md font-semibold uppercase no-underline text-gray-700 dark:text-gray-200 ease-in-out"
          >
            Ladrillos Mochica sac
          </button>

          <ul class="mt-6">
            <li class="relative px-6 py-3">
              <inertia-link
                :href="route('dashboard')"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-600 dark:hover:text-gray-200"
                :class="{
                  'text-purple-600 transition-colors duration-150 dark:hover:text-gray-200 dark:text-gray-100': route().current(
                    'dashboard'
                  ),
                }"
              >
                <span
                  v-if="route().current('dashboard')"
                  class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                  aria-hidden="true"
                ></span>
                <svg
                  class="w-6 h-6"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"
                  ></path>
                </svg>
                <span class="ml-4">Inicio</span>
              </inertia-link>
            </li>
            <li class="relative px-6 py-3">
              <inertia-link
                :href="route('proveedores.index')"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-600 dark:hover:text-gray-200"
                :class="{
                  'text-purple-600 transition-colors duration-150 dark:hover:text-gray-200 dark:text-gray-100': route().current(
                    'proveedores.*'
                  ),
                }"
              >
                <span
                  v-if="route().current('proveedores.*')"
                  class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                  aria-hidden="true"
                ></span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-6 w-6"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"
                  />
                </svg>

                <span class="ml-4">Proveedores</span>
              </inertia-link>
            </li>
            <li class="relative px-6 py-3">
              <inertia-link
                :href="route('categorias.index')"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-600 dark:hover:text-gray-200"
                :class="{
                  'text-purple-600 transition-colors duration-150 dark:hover:text-gray-200 dark:text-gray-100': route().current(
                    'categorias.*'
                  ),
                }"
              >
                <span
                  v-if="route().current('categorias.*')"
                  class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                  aria-hidden="true"
                ></span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-6 w-6"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z"
                  />
                  <path
                    d="M3 8a2 2 0 012-2v10h8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z"
                  />
                </svg>

                <span class="ml-4">Categorias</span>
              </inertia-link>
            </li>
            <li class="relative px-6 py-3">
              <inertia-link
                :href="route('productos.index')"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-600 dark:hover:text-gray-200"
                :class="{
                  'text-purple-600 transition-colors duration-150 dark:hover:text-gray-200 dark:text-gray-100': route().current(
                    'productos.*'
                  ),
                }"
              >
                <span
                  v-if="route().current('productos.*')"
                  class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                  aria-hidden="true"
                ></span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-6 w-6"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fill-rule="evenodd"
                    d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                    clip-rule="evenodd"
                  />
                </svg>

                <span class="ml-4">Productos</span>
              </inertia-link>
            </li>
            <li class="relative px-6 py-3">
              <inertia-link
                :href="route('ingresos.index')"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-600 dark:hover:text-gray-200"
                :class="{
                  'text-purple-600 transition-colors duration-150 dark:hover:text-gray-200 dark:text-gray-100': route().current(
                    'ingresos.*'
                  ),
                }"
              >
                <span
                  v-if="route().current('ingresos.*')"
                  class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                  aria-hidden="true"
                ></span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-6 w-6"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"
                  />
                </svg>

                <span class="ml-4">Ingresos</span>
              </inertia-link>
            </li>
            <li class="relative px-6 py-3">
              <inertia-link
                :href="route('clientes.index')"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-600 dark:hover:text-gray-200"
                :class="{
                  'text-purple-600 transition-colors duration-150 dark:hover:text-gray-200 dark:text-gray-100': route().current(
                    'clientes.*'
                  ),
                }"
              >
                <span
                  v-if="route().current('clientes.*')"
                  class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                  aria-hidden="true"
                ></span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-6 w-6"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                  />
                </svg>

                <span class="ml-4">Clientes</span>
              </inertia-link>
            </li>
            <li class="relative px-6 py-3">
              <inertia-link
                :href="route('salidas.index')"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-600 dark:hover:text-gray-200"
                :class="{
                  'text-purple-600 transition-colors duration-150 dark:hover:text-gray-200 dark:text-gray-100': route().current(
                    'salidas.*'
                  ),
                }"
              >
                <span
                  v-if="route().current('salidas.*')"
                  class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                  aria-hidden="true"
                ></span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-6 w-6"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"
                  />
                  <path
                    d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"
                  />
                </svg>
                <span class="ml-4">Salidas</span>
              </inertia-link>
            </li>
            <li
              class="relative px-6 py-3"
              v-if="$page.props.permission.users.viewAny"
            >
              <inertia-link
                :href="route('usuarios.index')"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-600 dark:hover:text-gray-200"
                :class="{
                  'text-purple-600 transition-colors duration-150 dark:hover:text-gray-200 dark:text-gray-100': route().current(
                    'usuarios.*'
                  ),
                }"
              >
                <span
                  v-if="route().current('usuarios.*')"
                  class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                  aria-hidden="true"
                ></span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-6 w-6"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fill-rule="evenodd"
                    d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                    clip-rule="evenodd"
                  />
                </svg>

                <span class="ml-4">Usuarios</span>
              </inertia-link>
            </li>
          </ul>
        </div>
      </aside>

      <!-- Responsive sidebar -->
      <aside
        class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 sm:hidden"
        :class="{
          block: showingNavigationDropdown,
          hidden: !showingNavigationDropdown,
        }"
      >
        <div class="py-4 text-gray-500 dark:text-gray-400">
          <button
            class="active:bg-transparent inline-flex focus:outline-none ml-2 px-2 text-md font-semibold uppercase no-underline text-gray-700 dark:text-gray-200 ease-in-out"
          >
            Ladrillos Mochica sac
          </button>
          <ul class="mt-6">
            <li class="relative px-6 py-3">
              <inertia-link
                :href="route('dashboard')"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-600 dark:hover:text-gray-200"
                :class="{
                  'text-purple-600 transition-colors duration-150 dark:hover:text-gray-200 dark:text-gray-100': route().current(
                    'dashboard'
                  ),
                }"
              >
                <span
                  v-if="route().current('dashboard')"
                  class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                  aria-hidden="true"
                ></span>
                <svg
                  class="w-6 h-6"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"
                  ></path>
                </svg>
                <span class="ml-4">Inicio</span>
              </inertia-link>
            </li>
            <li class="relative px-6 py-3">
              <inertia-link
                :href="route('proveedores.index')"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-600 dark:hover:text-gray-200"
                :class="{
                  'text-purple-600 transition-colors duration-150 dark:hover:text-gray-200 dark:text-gray-100': route().current(
                    'proveedores.*'
                  ),
                }"
              >
                <span
                  v-if="route().current('proveedores.*')"
                  class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                  aria-hidden="true"
                ></span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-6 w-6"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"
                  />
                </svg>

                <span class="ml-4">Proveedores</span>
              </inertia-link>
            </li>
            <li class="relative px-6 py-3">
              <inertia-link
                :href="route('categorias.index')"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-600 dark:hover:text-gray-200"
                :class="{
                  'text-purple-600 transition-colors duration-150 dark:hover:text-gray-200 dark:text-gray-100': route().current(
                    'categorias.*'
                  ),
                }"
              >
                <span
                  v-if="route().current('categorias.*')"
                  class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                  aria-hidden="true"
                ></span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-6 w-6"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z"
                  />
                  <path
                    d="M3 8a2 2 0 012-2v10h8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z"
                  />
                </svg>

                <span class="ml-4">Categorias</span>
              </inertia-link>
            </li>
            <li class="relative px-6 py-3">
              <inertia-link
                :href="route('productos.index')"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-600 dark:hover:text-gray-200"
                :class="{
                  'text-purple-600 transition-colors duration-150 dark:hover:text-gray-200 dark:text-gray-100': route().current(
                    'productos.*'
                  ),
                }"
              >
                <span
                  v-if="route().current('productos.*')"
                  class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                  aria-hidden="true"
                ></span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-6 w-6"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fill-rule="evenodd"
                    d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                    clip-rule="evenodd"
                  />
                </svg>

                <span class="ml-4">Productos</span>
              </inertia-link>
            </li>
            <li class="relative px-6 py-3">
              <inertia-link
                :href="route('ingresos.index')"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-600 dark:hover:text-gray-200"
                :class="{
                  'text-purple-600 transition-colors duration-150 dark:hover:text-gray-200 dark:text-gray-100': route().current(
                    'ingresos.*'
                  ),
                }"
              >
                <span
                  v-if="route().current('ingresos.*')"
                  class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                  aria-hidden="true"
                ></span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-6 w-6"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"
                  />
                </svg>

                <span class="ml-4">Ingresos</span>
              </inertia-link>
            </li>
            <li class="relative px-6 py-3">
              <inertia-link
                :href="route('clientes.index')"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-600 dark:hover:text-gray-200"
                :class="{
                  'text-purple-600 transition-colors duration-150 dark:hover:text-gray-200 dark:text-gray-100': route().current(
                    'clientes.*'
                  ),
                }"
              >
                <span
                  v-if="route().current('clientes.*')"
                  class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                  aria-hidden="true"
                ></span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-6 w-6"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                  />
                </svg>

                <span class="ml-4">Clientes</span>
              </inertia-link>
            </li>
            <li class="relative px-6 py-3">
              <inertia-link
                :href="route('salidas.index')"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-600 dark:hover:text-gray-200"
                :class="{
                  'text-purple-600 transition-colors duration-150 dark:hover:text-gray-200 dark:text-gray-100': route().current(
                    'salidas.*'
                  ),
                }"
              >
                <span
                  v-if="route().current('salidas.*')"
                  class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                  aria-hidden="true"
                ></span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-6 w-6"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"
                  />
                  <path
                    d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"
                  />
                </svg>
                <span class="ml-4">Salidas</span>
              </inertia-link>
            </li>
              <li
              class="relative px-6 py-3"
              v-if="$page.props.permission.users.viewAny"
            >
              <inertia-link
                :href="route('usuarios.index')"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-600 dark:hover:text-gray-200"
                :class="{
                  'text-purple-600 transition-colors duration-150 dark:hover:text-gray-200 dark:text-gray-100': route().current(
                    'usuarios.*'
                  ),
                }"
              >
                <span
                  v-if="route().current('usuarios.*')"
                  class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                  aria-hidden="true"
                ></span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-6 w-6"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fill-rule="evenodd"
                    d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                    clip-rule="evenodd"
                  />
                </svg>

                <span class="ml-4">Usuarios</span>
              </inertia-link>
            </li>
          </ul>
        </div>
      </aside>

      <!-- header and Body -->
      <div class="flex flex-col flex-1 w-full">
        <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
          <div
            class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300"
          >
            <!-- Mobile hamburger -->
            <button
              class="p-1 mr-5 -ml-1 md:hidden rounded-md focus:outline-none focus:shadow-outline-purple"
              @click="showingNavigationDropdown = !showingNavigationDropdown"
              aria-label="Menu"
            >
              <svg
                class="h-6 w-6"
                stroke="currentColor"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  :class="{
                    hidden: showingNavigationDropdown,
                    'inline-flex': !showingNavigationDropdown,
                  }"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"
                />
                <path
                  :class="{
                    hidden: !showingNavigationDropdown,
                    'inline-flex': showingNavigationDropdown,
                  }"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </button>

            <!-- Search input -->
            <div class="flex justify-center flex-1 lg:mr-32"></div>
            <ul class="flex items-center flex-shrink-0 space-x-6">
              <!-- Profile menu -->
              <li class="relative">
                <button
                  v-if="$page.props.jetstream.managesProfilePhotos"
                  class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
                  @click="toggleProfileMenu"
                  @keydown.escape="closeProfileMenu"
                  aria-label="Account"
                  aria-haspopup="true"
                >
                  <img
                    class="object-cover w-8 h-8 rounded-full"
                    :src="$page.props.user.profile_photo_url"
                    :alt="$page.props.user.name"
                    aria-hidden="true"
                  />
                </button>

                <button
                  v-else
                  class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
                  @click="toggleProfileMenu"
                  @keydown.escape="closeProfileMenu"
                  aria-label="Account"
                  aria-haspopup="true"
                >
                  <img
                    class="object-cover w-8 h-8 rounded-full"
                    src="https://images.unsplash.com/photo-1502378735452-bc7d86632805?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=aa3a807e1bbdfd4364d1f449eaa96d82"
                    alt=""
                    aria-hidden="true"
                  />
                </button>

                <template v-if="isProfileMenuOpen">
                  <ul
                    @click="closeProfileMenu"
                    @keydown.escape="closeProfileMenu"
                    class="absolute right-0 w-50 p-2 mt-2 items-center space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
                    aria-label="submenu"
                  >
                    <li class="flex">
                      <div
                        class="rounded rounded-t-lg overflow-hidden justify-center"
                      >
                        <div class="flex justify-center -mt-8">
                          <img
                            :src="$page.props.user.profile_photo_url"
                            class="rounded-full border-solid border-white border-2 mt-8 w-32 h-32"
                          />
                        </div>
                        <div class="text-center px-3 pb-6 pt-2">
                          <h3
                            class="dark:text-grey-dark text-sm bold font-sans"
                          >
                            {{ $page.props.user.name }}
                          </h3>
                        </div>
                        <div class="flex justify-center pb-1">
                          <div class="text-center mr-3 border-r pr-3">
                            <inertia-link
                              :href="route('profile.show')"
                              class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-purple-600 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                            >
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                              >
                                <path
                                  fill-rule="evenodd"
                                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                  clip-rule="evenodd"
                                />
                              </svg>
                              <span class="px-1">Perfil</span>
                            </inertia-link>
                          </div>

                          <div class="flex justify-center text-center">
                            <inertia-link
                              @click.prevent="logout"
                              class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-purple-600 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                            >
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                              >
                                <path
                                  fill-rule="evenodd"
                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z"
                                  clip-rule="evenodd"
                                />
                              </svg>
                              <span class="px-1">Salir</span>
                            </inertia-link>
                          </div>
                        </div>
                      </div>
                    </li>

                    <li
                      class="flex"
                      v-if="$page.props.jetstream.hasApiFeatures"
                    >
                      <inertia-link
                        class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        :href="route('api-tokens.index')"
                      >
                        <svg
                          class="w-4 h-4 mr-3"
                          aria-hidden="true"
                          fill="none"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                          ></path>
                          <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>Ajustes</span>
                      </inertia-link>
                    </li>
                  </ul>
                </template>
              </li>
            </ul>
          </div>
        </header>

        <main class="h-full overflow-y-auto">
          <div class="container grid px-6 mx-auto" scroll-region>
            <flash-messages ></flash-messages>
            <slot> </slot>
          </div>
        </main>
      </div>
    </div>
  </div>
</template>

<script>
import JetApplicationMark from "@/Jetstream/ApplicationMark";
import JetBanner from "@/Jetstream/Banner";
import JetDropdown from "@/Jetstream/Dropdown";
import JetDropdownLink from "@/Jetstream/DropdownLink";
import FlashMessages from "@/Jetstream/FlashMessages";
import JetNavLink from "@/Jetstream/NavLink";
import JetResponsiveNavLink from "@/Jetstream/ResponsiveNavLink";

export default {
  components: {
    JetApplicationMark,
    JetBanner,
    JetDropdown,
    FlashMessages,
    JetDropdownLink,
    JetNavLink,
    JetResponsiveNavLink,
  },

  data() {
    return {
      trapCleanup: null,
      showingNavigationDropdown: false,
      isNotificationsMenuOpen: false,
      isProfileMenuOpen: false,
    };
  },

  methods: {
    switchToTeam(team) {
      this.$inertia.put(
        route("current-team.update"),
        {
          team_id: team.id,
        },
        {
          preserveState: false,
        }
      );
    },

    logout() {
      this.$inertia.post(route("logout"));
    },

    toggleNotificationsMenu() {
      this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen;
    },
    closeNotificationsMenu() {
      this.isNotificationsMenuOpen = false;
    },

    toggleProfileMenu() {
      this.isProfileMenuOpen = !this.isProfileMenuOpen;
    },
    closeProfileMenu() {
      this.isProfileMenuOpen = false;
    },
  },
};
</script>
