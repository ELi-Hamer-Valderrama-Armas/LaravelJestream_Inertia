<template>
  <div>
    <jet-banner />

    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': ishowingNavigationDropdown }"
    >
      <!-- Desktop sidebar -->
      <aside
        class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0"
      >
        <div class="py-4 text-gray-500 dark:text-gray-400">
          <button
            class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
          >
            Empresa S.A.C
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
                  'text-purple-600 transition-colors duration-150 dark:hover:text-gray-200 dark:text-gray-100':
                    route().current('proveedores.*')
                }"
              >
                <span
                  v-if="
                    route().current('proveedores.*')
                  "
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
                    fill-rule="evenodd"
                    d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
                    clip-rule="evenodd"
                  ></path>
                  <path
                    d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z"
                  ></path>
                </svg>

                <span class="ml-4">Proveedores</span>
              </inertia-link>
            </li>
            <li class="relative px-6 py-3">
              <inertia-link
                :href="route('categorias.index')"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-600 dark:hover:text-gray-200"
                :class="{
                  'text-purple-600 transition-colors duration-150 dark:hover:text-gray-200 dark:text-gray-100':
                    route().current('categorias.*')
                }"
              >
                <span
                  v-if="
                    route().current('categorias.*')
                  "
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
                    fill-rule="evenodd"
                    d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
                    clip-rule="evenodd"
                  ></path>
                  <path
                    d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z"
                  ></path>
                </svg>

                <span class="ml-4">Categorias</span>
              </inertia-link>
            </li>
            <li class="relative px-6 py-3">
              <inertia-link
                :href="route('productos.index')"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-600 dark:hover:text-gray-200"
                :class="{
                  'text-purple-600 transition-colors duration-150 dark:hover:text-gray-200 dark:text-gray-100':
                    route().current('productos.*')
                }"
              >
                <span
                  v-if="
                    route().current('productos.*')
                  "
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
                    fill-rule="evenodd"
                    d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
                    clip-rule="evenodd"
                  ></path>
                  <path
                    d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z"
                  ></path>
                </svg>

                <span class="ml-4">Productos</span>
              </inertia-link>
            </li>           
            <li class="relative px-6 py-3">
              <inertia-link
                :href="route('ingresos.index')"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-600 dark:hover:text-gray-200"
                :class="{
                  'text-purple-600 transition-colors duration-150 dark:hover:text-gray-200 dark:text-gray-100':
                    route().current('ingresos.*')
                }"
              >
                <span
                  v-if="
                    route().current('ingresos.*')
                  "
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
                    fill-rule="evenodd"
                    d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
                    clip-rule="evenodd"
                  ></path>
                  <path
                    d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z"
                  ></path>
                </svg>

                <span class="ml-4">Ingresos</span>
              </inertia-link>
            </li>
            <li class="relative px-6 py-3"
            >
              <inertia-link
                :href="route('clientes.index')"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-600 dark:hover:text-gray-200"
                :class="{
                  'text-purple-600 transition-colors duration-150 dark:hover:text-gray-200 dark:text-gray-100':
                    route().current('clientes.*') 
                }"
              >
                <span
                  v-if="
                    route().current('clientes.*')
                  "
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
                    fill-rule="evenodd"
                    d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
                    clip-rule="evenodd"
                  ></path>
                  <path
                    d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z"
                  ></path>
                </svg>

                <span class="ml-4">Clientes</span>
              </inertia-link>
            </li>
           
            <li class="relative px-6 py-3">
              <inertia-link
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="route('products.index')"
                style="text-decoration: none"
              >
                <span
                  v-if="route().current('products.index')"
                  class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                  aria-hidden="true"
                ></span>
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                  ></path>
                </svg>
                <span class="ml-4">Salidas</span>
              </inertia-link>
            </li>
             <li class="relative px-6 py-3"
            v-if="$page.props.permission.users.viewAny">
              <inertia-link
               
                :href="route('usuarios.index')"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-600 dark:hover:text-gray-200"
                :class="{
                  'text-purple-600 transition-colors duration-150 dark:hover:text-gray-200 dark:text-gray-100':
                    route().current('usuarios.*')
                }"
              >
                <span
                  v-if="
                    route().current('usuarios.*')
                  "
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
                    fill-rule="evenodd"
                    d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
                    clip-rule="evenodd"
                  ></path>
                  <path
                    d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z"
                  ></path>
                </svg>

                <span class="ml-4">Configuración</span>
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
          <a
            class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
            href="#"
          >
            Ladrillos Mochica S.A.C
          </a>
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
                :href="route('categorias.index')"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-purple-600 dark:hover:text-gray-200"
                :class="{
                  'text-purple-600 transition-colors duration-150 dark:hover:text-gray-200 dark:text-gray-100':
                    route().current('categorias.index') ||
                    route().current('categorias.create') ||
                    route().current('categorias.edit'),
                }"
              >
                <span
                  v-if="
                    route().current('categorias.index') ||
                    route().current('categorias.create') ||
                    route().current('categorias.edit')
                  "
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
                    fill-rule="evenodd"
                    d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
                    clip-rule="evenodd"
                  ></path>
                  <path
                    d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z"
                  ></path>
                </svg>

                <span class="ml-4">Categorias</span>
              </inertia-link>
            </li>
            <li class="relative px-6 py-3">
              <inertia-link
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="route('products.index')"
              >
                <span
                  v-if="route().current('products.index')"
                  class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                  aria-hidden="true"
                ></span>
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                  ></path>
                </svg>
                <span class="ml-4">Productos</span>
              </inertia-link>
            </li>
            <li class="relative px-6 py-3">
              <inertia-link
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="route('products.index')"
              >
                <span
                  v-if="route().current('products.index')"
                  class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                  aria-hidden="true"
                ></span>
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                  ></path>
                </svg>
                <span class="ml-4">Areas</span>
              </inertia-link>
            </li>
            <li class="relative px-6 py-3">
              <inertia-link
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="route('products.index')"
              >
                <span
                  v-if="route().current('products.index')"
                  class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                  aria-hidden="true"
                ></span>
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                  ></path>
                </svg>
                <span class="ml-4">Ingresos</span>
              </inertia-link>
            </li>
            <li class="relative px-6 py-3">
              <inertia-link
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="route('products.index')"
              >
                <span
                  v-if="route().current('products.index')"
                  class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                  aria-hidden="true"
                ></span>
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                  ></path>
                </svg>
                <span class="ml-4">Clientes</span>
              </inertia-link>
            </li>
            <li class="relative px-6 py-3">
              <inertia-link
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="route('products.index')"
              >
                <span
                  v-if="route().current('products.index')"
                  class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                  aria-hidden="true"
                ></span>
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                  ></path>
                </svg>
                <span class="ml-4">Usuarios</span>
              </inertia-link>
            </li>
            <li class="relative px-6 py-3">
              <inertia-link
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="route('products.index')"
              >
                <span
                  v-if="route().current('products.index')"
                  class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                  aria-hidden="true"
                ></span>
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                  ></path>
                </svg>
                <span class="ml-4">Salidas</span>
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
              class="p-1 mr-5 -ml-1 rounded-md md:hidden lg:hidden focus:outline-none focus:shadow-outline-purple"
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
                            class="rounded-full border-solid border-white border-2 mt-8"
                          />
                        </div>
                        <div class="text-center px-3 pb-6 pt-2">
                          <h3
                            class="dark:text-grey-dark text-sm bold font-sans"
                          >
                            {{ $page.props.user.name }}
                          </h3>
                        </div>
                        <div class="flex justify-center pb-3">
                          <div class="text-center mr-3 border-r pr-3">
                            <inertia-link
                              :href="route('profile.show')"
                              class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-purple-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                            >
                              <svg
                                class="w-6 h-6"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                              >
                                <path
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                ></path>
                              </svg>
                              <span class="px-1">Perfil</span>
                            </inertia-link>
                          </div>

                          <div class="flex justify-center text-center">
                            <inertia-link
                              @click.prevent="logout"
                              class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-purple-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                            >
                              <svg
                                class="w-6 h-6"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                              >
                                <path
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                ></path>
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
            <flash-messages :hide="false"></flash-messages>
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
