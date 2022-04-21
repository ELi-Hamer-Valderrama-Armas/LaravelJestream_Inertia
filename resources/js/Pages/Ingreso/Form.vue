<template>
  <div>
    <app-layout>
      <div class="container px-6 mx-auto grid">
        <ul class="flex py-6 text-sm lg:text-base">
          <li class="inline-flex text-gray-700 items-center dark:text-gray-400">
            <inertia-link :href="route('ingresos.index')"
              >Ingresos</inertia-link
            >
            <svg
              class="h-5 w-auto text-gray-400"
              fill="currentColor"
              viewBox="0 0 20 20"
            >
              <path
                fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </li>
          <li class="inline-flex items-center text-gray-500">
            <div class="text-teal-400">Crear</div>
          </li>
        </ul>

        <form @submit.prevent="submit">
          <div
            class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
          >
            <div class="flex px-5 justify-between">
              <h2
                class="my-2 text-lg font-semibold text-gray-700 dark:text-gray-200 mb-6 pb-2"
              >
                Nuevo ingreso
              </h2>

              <div>
                <div class="relative mr-4 inline-block"></div>
              </div>
            </div>
            <div class="flex flex-wrap justify-between mb-8">
              <div class="w-full md:w-2/5 px-6 mb-2 md:mb-0">
                <div class="mb-2 md:mb-1 md:flex items-center">
                  <jet-label
                    class="-mt-2 w-32 -mb-1"
                    for="Fecha"
                    value="Fecha"
                  />
                  <span
                    class="mr-4 inline-block hidden md:block text-gray-700 dark:text-gray-300"
                    >:</span
                  >
                  <div class="flex-1">
                    <datepicker
                      class="bg-gray-100 appearance-none focus:ring-purple-500 border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:border-purple-500 rounded-lg dark:border-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-purple-500 dark:focus:shadow-outline-gray dark:border-gray-800"
                      v-model="form.Fecha"
                      inputFormat="yyyy/MM/dd"
                    />

                    <div
                      v-if="errors['0.Fecha']"
                      class="px-4 py-2 text-xs py-2 text-red-400 dark:text-red-400"
                    >
                      La fecha es requerida
                    </div>
                  </div>
                </div>
                <div class="mb-2 md:mb-1 md:flex items-center">
                  <jet-label
                    class="-mt-2 w-32 -mb-1"
                    for="Comprobante"
                    v-model="form.user_id"
                    value="Comprobante"
                  />
                  <span
                    class="mr-4 inline-block hidden md:block text-gray-700 dark:text-gray-300"
                    >:</span
                  >
                  <div class="flex-1">
                    <select
                      class="bg-gray-100 appearance-none focus:ring-purple-500 border-gray-100 rounded w-full py-2 w-full mt-1 block text-gray-700 leading-tight focus:border-purple-500 rounded-lg dark:border-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-purple-500 dark:focus:shadow-outline-gray dark:border-gray-800"
                      v-model="form.TipoComprobante"
                      placeholder="-----"
                      autofocus="true"
                    >
                      <option value="Factura">Factura</option>
                      <option value="Boleta">Boleta</option>
                      <option value="Guía de Remisión">Guía de Remisión</option>
                      <option value="Acta de entrega">Acta de Recepción</option>
                    </select>
                    <div
                      v-if="errors['0.TipoComprobante']"
                      class="text-xs px-4 py-2 text-red-400 dark:text-red-400"
                    >
                      El comprobante es requerido
                    </div>
                  </div>
                </div>
              </div>

              <div class="w-full md:w-2/5">
                <div class="mb-2 px-6 md:mb-1 md:flex items-center">
                  <jet-label
                    class="-mt-2 w-32 -mb-1 text-xm"
                    for="Serie"
                    value="Serie"
                  />

                  <span
                    class="mr-4 inline-block hidden md:block text-gray-700 dark:text-gray-200"
                    >:</span
                  >
                  <div class="flex-1">
                    <jet-input
                      id="SerieComprobante"
                      type="text"
                      class="mt-1 block w-full"
                      v-model="form.SerieComprobante"
                      placeholder="---"
                      autocomplete="off"
                    />
                    <div
                      v-if="errors['0.SerieComprobante']"
                      class="px-4 py-2 text-xs py-2 text-red-400 dark:text-red-400"
                    >
                      La serie es requerido
                    </div>
                  </div>
                </div>
                <div class="mb-2 md:mb-1 px-6 md:flex items-center">
                  <jet-label
                    class="-mt-2 w-32 -mb-1 text-xm"
                    for="Número"
                    value="Número"
                  />
                  <span
                    class="mr-4 inline-block hidden md:block text-gray-700 dark:text-gray-300"
                    >:</span
                  >
                  <div class="flex-1">
                    <jet-input
                      id="NumeroDocumento"
                      type="text"
                      class="mt-1 block w-full"
                      v-model="form.NumeroComprobante"
                      placeholder="---"
                      autocomplete="off"
                    />
                    <div
                      v-if="errors['0.NumeroComprobante']"
                      class="px-4 py-2 text-xs py-2 text-red-400 dark:text-red-400"
                    >
                      El número es requerido
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="flex flex-wrap justify-between mb-2">
              <div class="w-full md:w-1/3 mb-2 px-4 md:mb-0">
                <label
                  class="text-gray-700 px-2 dark:text-gray-300 block mb-1 font-bold text-sm uppercase"
                  >Proveedor</label
                >
                <table class="text-sm my-2">
                  <tbody>
                    <tr>
                      <td
                        class="px-2 py-2 text-gray-500 dark:text-gray-400 font-semibold"
                      >
                        Nombres
                        <span class="text-gray-700 dark:text-gray-300">:</span>
                      </td>
                      <td class="px-2 py-2 text-gray-500 dark:text-gray-300">
                        {{ provNombre }}
                      </td>
                    </tr>
                    <tr>
                      <td
                        class="px-2 py-2 text-gray-500 dark:text-gray-400 font-semibold"
                      >
                        Dni / Ruc
                        <span class="text-gray-700 dark:text-gray-300">:</span>
                      </td>
                      <td class="px-2 py-2 text-gray-500 dark:text-gray-300">
                        {{ provRuc }}
                      </td>
                    </tr>

                    <div
                      v-if="errors['0.persona_id']"
                      class="px-4 py-2 text-xs py-2 text-red-400 dark:text-red-400"
                    >
                      Los datos del proveedor son requerido
                    </div>
                  </tbody>
                </table>
              </div>

              <div class="w-full md:w-1/3">
                <div class="flex px-5">
                  <a
                    href="#"
                    class="w-full px-6 py-3 uppercase tracking-widest font-bold leading-5 inline-flex items-center text-xs leading-5 text-green-400 transition-colors duration-150 border border-green-400 rounded-lg dark:text-green-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-green-500 focus:border-green-400 active:text-green-400 focus:outline-none focus:shadow-outline-green"
                    @click="openModal = !openModal"
                  >
                    Producto
                  </a>
                </div>
                <div class="relative">
                  <div class="flex p-2 px-5">
                    <a
                      href="#"
                      class="w-full px-6 py-3 uppercase tracking-widest leading-5 inline-flex items-center font-bold text-xs leading-5 text-yellow-400 transition-colors duration-150 border border-yellow-400 rounded-lg dark:text-yellow-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-yellow-500 focus:border-yellow-400 active:text-yellow-400 focus:outline-none focus:shadow-outline-yellow"
                      @click="toggleProfileMenu"
                      @keydown.escape="closeProfileMenu"
                    >
                      Proveedor
                    </a>
                  </div>

                  <div
                    v-if="isProfileMenuOpen"
                    class="absolute shadow top-100 z-40 mt-1 lef-0 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
                  >
                    <div class="flex flex-col w-full dark:bg-gray-700 h-20">
                      <div
                        class="cursor-pointer w-full rounded-t hover:bg-teal-100"
                      >
                        <div class="flex w-full items-center relative">
                          <div class="w-full items-center flex">
                            <div class="mx-2 mt-1 focus-within:text-purple-500">
                              <div
                                class="absolute inset-y-0 flex items-center pl-2"
                              >
                                <svg
                                  class="w-4 h-4"
                                  aria-hidden="true"
                                  fill="currentColor"
                                  viewBox="0 0 20 20"
                                >
                                  <path
                                    fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"
                                  ></path>
                                </svg>
                              </div>
                              <jet-input
                                id="searchale"
                                placeholder="Buscar Nombre"
                                type="search"
                                v-model="buscar"
                                autofocus="true"
                                autocomplete="off"
                                class="px-8 mt-1 mb-1 w-full dark:border-purple-500"
                              />
                            </div>
                          </div>
                        </div>

                        <div class="overflow-y-auto h-32">
                          <ul
                            @click="closeProfileMenu"
                            @keydown.escape="closeProfileMenu"
                            class="text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
                            aria-label="submenu"
                          >
                            <li
                              class="flex"
                              v-for="(proveedor, index) in resultQuery"
                              :key="index"
                            >
                              <button
                                class="inline-flex items-center focus:outline-none w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                v-for="(usuario, index) in usuarios"
                                :key="index"
                                @click="
                                  selectProveedor(
                                    usuario.id,
                                    proveedor.id,
                                    proveedor.Nombres,
                                    proveedor.NumeroDocumento
                                  )
                                "
                              >
                                <div class="w-full flex">
                                  <div class="mx-2 text-left">
                                    {{ proveedor.Nombres }}
                                    <div
                                      class="text-xs text-left truncate w-full normal-case font-normal mt-1 text-gray-500 dark:text-gray-400"
                                    >
                                      {{ proveedor.TipoDocumento }}:
                                      {{ proveedor.NumeroDocumento }}
                                    </div>
                                  </div>
                                </div>
                              </button>
                            </li>
                            <li v-if="resultQuery.length <= 0" class="flex">
                              <a
                                class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                href="#"
                              >
                                <div class="w-full items-center flex">
                                  <div class="mx-2">
                                    No existen datos.
                                  </div>
                                </div>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="flex flex-col grid py-2 px-6">
              <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div
                  class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8"
                >
                  <div
                    class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg dark:border-gray-700 dark:divide-gray-700"
                  >
                    <table
                      class="min-w-full divide-y divide-gray-200 dark:divide-gray-700"
                    >
                      <thead>
                        <tr
                          class="text-xs font-semibold tracking-wide text-left text-white uppercase border-bdark:border-gray-700 bg-gray-600 dark:text-gray-400 dark:bg-gray-700"
                        >
                          <th class="px-4 py-3">ID</th>
                          <th class="px-4 py-3">PRODUCTO</th>
                          <th class="px-4 py-3">CANTIDAD</th>
                          <th class="px-4 py-3">
                            PRECIO <span class="text-xs">(Incl. IGV)</span>
                          </th>
                          <th class="px-4 py-3">
                            MONTO <span class="text-xs">(Incl. IGV)</span>
                          </th>
                          <th class="px-4 py-3">ACCION</th>
                        </tr>
                      </thead>
                      <tbody
                        class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                      >
                        <tr
                          v-for="(itemsProd, index) in arrayItemMP"
                          :key="index"
                          class="text-gray-700 dark:text-gray-400"
                          :class="{
                            'bg-gray-50 dark:bg-gray-800': index % 2 === 0,
                          }"
                        >
                          <td class="px-4 py-3 text-sm">
                            {{ index + 1 }}
                          </td>
                          <td class="px-4 py-3 text-sm">
                            {{ itemsProd.nombre }}
                          </td>
                          <td class="px-4 py-3 text-sm">
                            {{ itemsProd.cantidad }}
                          </td>
                          <td class="px-4 py-3 text-sm">
                           S/. {{ itemsProd.precio }}
                          </td>
                          <td class="px-4 py-3 text-sm">
                            S/. {{ itemsProd.monto }}
                          </td>

                          <td
                            class="px-6 py-1 whitespace-nowrap text-sm text-gray-500"
                          >
                            <div class="flex items-center space-x-4 text-sm">
                              <a
                                @click="removeList(index)"
                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                              >
                                <svg
                                  class="w-5 h-5"
                                  aria-hidden="true"
                                  fill="currentColor"
                                  viewBox="0 0 20 20"
                                >
                                  <path
                                    fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd"
                                  ></path>
                                </svg>
                              </a>
                            </div>
                          </td>
                        </tr>

                        <tr v-if="arrayItemMP.length === 0">
                          <td class="px-4 py-3 text-sm" colspan="5">
                            <p
                              class="text-sm text-center text-gray-700 dark:text-gray-300"
                            >
                              No existen datos.
                            </p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <div
                      class="grid px-4 py-1 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-white sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <span
                        class="flex col-span-12 mt-2 sm:mt-auto sm:justify-end"
                      >
                        <div class="py-2 ml-auto mt-5 w-full sm:w-2/4 lg:w-1/4">
                          <div class="flex justify-between mb-3">
                            <div class="text-right flex-1">
                              Total incl. IGV
                            </div>
                            <div class="text-right text-sm w-40">
                              <div>
                               S/. {{ form.Total }}
                              </div>
                            </div>
                          </div>
                          <div class="flex justify-between mb-4">
                            <div class="text-right flex-1">
                              IGV({{ igvVariando }}%) incl. Total
                            </div>
                            <div class="text-right text-sm w-40">
                              S/. {{ form.Impuesto }}
                            </div>
                          </div>

                          <div
                            class="py-2 border-t border-b dark:border-gray-700"
                          >
                            <div class="flex justify-between">
                              <div class="text-right flex-1">
                                Monto Total
                              </div>
                              <div class="text-right w-40">
                                <div class="text-xl font-bold">
                                 S/. {{ form.Total }}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              v-if="errors['1.0.precio']"
              class="px-4 py-2 text-xs py-2 text-red-400 dark:text-red-400"
            >
              Los datos de está tabla son requeridos
            </div>
            <h2 class="mt-6"></h2>
            <jet-button
              class="ml-4"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >
              Guardar
            </jet-button>
          </div>
        </form>

        <!-- / Modal -->
        <jet-modal :show="openModal" @close="openModal = false">
          <div
            class="mx-auto rounded-lg dark:text-gray-400 dark:bg-gray-800 shadow-xl"
          >
            <div
              class="flex flex-row justify-between p-5 dark:bg-gray-700 rounded-tl-lg rounded-tr-lg bg-gray-100"
            >
              <p
                class="dark:text-gray-300 text-gray-700 block font-bold text-sm uppercase"
              >
                Añadir producto
              </p>

              <div
                class="text-gray-400 hover:text-gray-800 dark:hover:text-gray-300"
                @click="cancelFormModal"
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
                    d="M6 18L18 6M6 6l12 12"
                  ></path>
                </svg>
              </div>
            </div>

            <form @submit.prevent="addItemMP">
              <div
                class="flex flex-col px-6 dark:text-gray-400 dark:bg-gray-800 relative"
              >
                <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8">
                  <div class="grid grid-cols-1">
                    <div class="">
                      <div>
                        <jet-label for="Producto" value="Producto" />
                        <div class="flex w-full items-center relative">
                          <div class="w-full items-center mt-1 flex">
                            <div
                              class="absolute inset-y-0 flex items-center text-gray-400 dark:text-gray-400 pl-2 mb-2"
                            >
                              <svg
                                class="w-5 h-5"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                              >
                                <path
                                  fill-rule="evenodd"
                                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                  clip-rule="evenodd"
                                ></path>
                              </svg>
                            </div>
                            <jet-input
                              placeholder="Buscar Nombre"
                              type="search"
                              v-model="itemsMP.buscarP"
                              reqruired
                              @focus="dropProductos = true"
                              class="pl-10 mb-2 w-full"
                            />
                          </div>
                        </div>
                      </div>

                      <div v-if="dropProductos" class="absolute top-100">
                        <div class="overflow-y-auto h-32">
                          <ul
                            @click="closeProfileMenu"
                            @keydown.escape="closeProfileMenu"
                            class="text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
                          >
                            <li
                              class="flex"
                              v-for="(producto, index) in resultProductos"
                              :key="index"
                            >
                              <button
                                class="inline-flex focus:outline-none items-left w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                @click="
                                  setBuscarP(
                                    producto.id,
                                    producto.Nombre,
                                    producto.Stock,
                                    producto.UnidadMedida,
                                    producto.PrecioVenta
                                  )
                                "
                              >
                                <div class="w-full flex">
                                  <div class="mx-2 text-left">
                                    {{ producto.Nombre }}

                                    <div
                                      class="text-xs text-left truncate w-full normal-case font-normal -mt-1 text-gray-500 dark:text-gray-400"
                                    >
                                      {{ producto.Stock }}
                                    </div>
                                  </div>
                                </div>
                              </button>
                            </li>
                            <li v-if="resultProductos.length <= 0" class="flex">
                              <div class="w-full items-center flex">
                                <div class="mx-2">
                                  No existen datos.
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="grid grid-cols-1">
                    <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8">
                      <div class="grid grid-cols-1">
                        <div>
                          <jet-label for="Cantidad" value="Cantidad" />

                          <div class="flex w-full items-center relative">
                            <div class="w-full items-center mt-1 flex">
                              <div
                                class="absolute inset-y-0 flex items-center text-gray-400 dark:text-gray-400 pl-2 mb-2"
                              >
                                <svg
                                  class="w-5 h-5"
                                  fill="none"
                                  stroke="currentColor"
                                  viewBox="0 0 24 24"
                                  xmlns="http://www.w3.org/2000/svg"
                                >
                                  <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                                  ></path>
                                </svg>
                              </div>
                              <jet-input
                                id="Cantidad"
                                type="number"
                                required
                                class="pl-10 mb-2 w-full"
                                v-model="itemsMP.Cantidad"
                                placeholder="0"
                                autocomplete="off"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="grid grid-cols-1">
                        <div>
                          <jet-label
                            for="StokActual"
                            v-model="itemsMP.idProducto"
                            value="Stok Actual"
                          />
                          <div
                            class="flex items-center bg-white dark:bg-gray-800 rounded mb-4 mt-1 border-2 dark:border-gray-700 border-gray-100"
                          >
                            <span
                              class="ml-2 bg-white dark:bg-gray-800 text-gray-400 dark:text-gray-400"
                            >
                              <svg
                                class="w-5 h-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                              >
                                <path
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                                ></path>
                              </svg>
                            </span>
                            <input
                              id="StokActual"
                              type="number"
                              v-model="Stock"
                              required
                              disabled
                              class="bg-transparent border-0 appearance-none outline-none ring-0 border-black border-white appearance-none focus:ring-purple-500 border-gray-50 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:border-purple-500 rounded-lg dark:border-gray-800 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-purple-500 dark:focus:shadow-outline-white dark:border-gray-800"
                              placeholder="0"
                              autocomplete="off"
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="items-center py-2">
                  <h2
                    class="font-bold text-2xl border-gary-700 dark:border-gray-500 border-b pb-2"
                  />
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 md:gap-8">
                  <div class="grid grid-cols-1">
                    <div>
                      <jet-label for="UnidadMedida" value="Unidad Medida" />
                      <div
                        class="flex items-center bg-white dark:bg-gray-800 rounded mb-4 mt-1 border-2 dark:border-gray-700 border-gray-100"
                      >
                        <span
                          class="ml-2 bg-white dark:bg-gray-800 text-gray-400 dark:text-gray-400"
                        >
                          <svg
                            class="w-5 h-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"
                            ></path>
                          </svg>
                        </span>
                        <input
                          id="UnidadMedida"
                          type="text"
                          v-model="UnidadMedida"
                          class="bg-transparent border-0 appearance-none outline-none ring-0 border-black border-white appearance-none focus:ring-purple-500 border-gray-50 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:border-purple-500 rounded-lg dark:border-gray-800 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-purple-500 dark:focus:shadow-outline-white dark:border-gray-800"
                          placeholder="Unidad"
                          autocomplete="off"
                          required
                          disabled
                        />
                      </div>
                    </div>
                  </div>
                  <div class="grid grid-cols-1">
                    <div>
                      <jet-label for="PrecioUnitario" value="Precio" />

                      <div
                        class="flex items-center bg-white dark:bg-gray-800 rounded mb-4 mt-1 border-2 dark:border-gray-700 border-gray-100"
                      >
                        <span
                          class="ml-2 bg-white dark:bg-gray-800 text-gray-400 dark:text-gray-400"
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
                              d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                            ></path>
                          </svg>
                        </span>
                        <input
                          id="PrecioUnitario"
                          type="number"
                          required
                          disabled
                          v-model="PrecioUnitario"
                          placeholder="0.00"
                          autocomplete="off"
                          class="bg-transparent border-0 appearance-none outline-none ring-0 border-black border-white appearance-none focus:ring-purple-500 border-gray-50 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:border-purple-500 rounded-lg dark:border-gray-800 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-purple-500 dark:focus:shadow-outline-white dark:border-gray-800"
                        />
                      </div>
                    </div>
                  </div>

                  <div class="grid grid-cols-1">
                    <div>
                      <jet-label for="Monto" value="Monto" />

                      <div
                        class="flex items-center bg-white dark:bg-gray-800 rounded mb-4 mt-1 border-2 dark:border-gray-700 border-gray-100"
                      >
                        <span
                          class="ml-2 bg-white dark:bg-gray-800 text-gray-400 dark:text-gray-400"
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
                              d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                            ></path>
                          </svg>
                        </span>
                        <input
                          id="Monto"
                          type="number"
                          v-model="calcularMonto"
                          placeholder="0.00"
                          disabled
                          class="bg-transparent border-0 appearance-none outline-none ring-0 border-black border-white appearance-none focus:ring-purple-500 border-gray-50 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:border-purple-500 rounded-lg dark:border-gray-800 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-purple-500 dark:focus:shadow-outline-white dark:border-gray-800"
                        />
                      </div>
                    </div>
                  </div>
                </div>

                <div class="flex flex-wrap justify-between mb-2">
                  <div class="w-full md:w-1/3 md:px-1 mb-2 md:mb-0">
                    <div class="mb-2 md:mb-1 md:pr-5 md:flex items-center">
                      <div class="mb-2">
                        <jet-label for="IGV" value="IGV" />

                        <div
                          class="flex items-center bg-white dark:bg-gray-800 rounded mb-4 mt-1 border-2 dark:border-gray-700 border-gray-100"
                        >
                          <span
                            class="ml-2 bg-white dark:bg-gray-800 text-gray-400 dark:text-gray-400"
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
                                d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z"
                              ></path>
                            </svg>
                          </span>
                          <input
                            id="IGV"
                            type="number"
                            v-model="itemsMP.Igv"
                            placeholder="18 "
                            disabled
                            autocomplete="off"
                            class="bg-transparent border-0 appearance-none outline-none ring-0 border-black border-white appearance-none focus:ring-purple-500 border-gray-50 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:border-purple-500 rounded-lg dark:border-gray-800 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-purple-500 dark:focus:shadow-outline-white dark:border-gray-800"
                          />
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="w-full md:w-2/3">
                    <div class="md:mb-1 md:flex p-8 items-center">
                      <div
                        v-if="errores.length && showAlert"
                        class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-red-100 bg-red-400 border border-red-400"
                      >
                        <div class="pr-6">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="100%"
                            height="100%"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="feather feather-alert-octagon w-5 h-5 mx-2"
                          >
                            <polygon
                              points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"
                            ></polygon>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                          </svg>
                        </div>
                        <div
                          class="text-sm font-normal max-w-full md:w-full flex-initial md:pr-6"
                        >
                          <ul class="list-disc list-inside text-sm">
                            <li v-for="(error, key) in errores" :key="key">
                              {{ error }}
                            </li>
                          </ul>
                        </div>
                        <div class="flex flex-auto flex-row-reverse">
                          <div @click="showAlert = !showAlert">
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="100%"
                              height="100%"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                              stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              class="feather feather-x cursor-pointer hover:text-red-400 rounded-full w-5 h-5 ml-2"
                            >
                              <line x1="18" y1="6" x2="6" y2="18"></line>
                              <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div
                class="flex flex-col justify-end px-6 py-4 bg-gray-100 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row text-right bg-gray-50 dark:bg-gray-700"
              >
                <button
                  @click="cancelFormModal"
                  class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
                >
                  Cancelar
                </button>
                <button
                  class="w-full px-5 text-center py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                  value="addItemMP"
                >
                  Agregar
                </button>
              </div>
            </form>
          </div>
        </jet-modal>
      </div>
    </app-layout>
  </div>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import JetInputDisable from "@/Jetstream/InputDisable";
import JetLabel from "@/Jetstream/Label";
import JetModal from "@/Jetstream/Modal";
import Datepicker from "vue3-datepicker";
import moment from "moment";
import JetPagination from "@/Jetstream/Pagination";

export default {
  components: {
    AppLayout,
    JetButton,
    JetInput,
    JetInputDisable,
    JetLabel,
    JetModal,
    JetPagination,
    Datepicker,
    moment,
  },
  props: {
    proveedores: Array,
    productos: Array,
    usuarios: Array,
    errors: Object,
  },

  data() {
    return {
      isProfileMenuOpen: false,
      form: {
        Fecha: new Date(),
        TipoComprobante: null,
        SerieComprobante: null,
        NumeroComprobante: null,
        Impuesto: 0,
        Total: 0,
        persona_id: null,
        user_id: null,
      },

      //product modal
      errores: [],
      Stock: null,
      UnidadMedida: null,
      PrecioUnitario: 0,
      dropProductos: false,
      filterBuscarPr: [],
      openModal: false,
      auxiliar: null,
      showAlert: true,

      //provedor dropdaw
      buscar: null,
      provNombre: null,
      provRuc: null,

      //tablas add
      arrayItemMP: [],
      itemsMP: {
        idProducto: null,
        buscarP: null,
        Cantidad: 0,
        Monto: 0,
        Igv: 18,
        Total: 0,
      },
      igvVariado: 18,
    };
  },
  methods: {
    addItemMP() {
      this.showAlert = true;
      this.errores = [];
      if (this.comparartabla >= 0) {
        this.errores.push(
          "El producto ya fue agregado, si desea volver agregarlo eliminelo de su tabla."
        );
      }
      if (!this.itemsMP.buscarP) {
        this.errores.push("El producto es obligatorio.");
      }
      if (!this.itemsMP.Cantidad) {
        this.errores.push("La cantidad es obligatorio.");
      }
      if (!this.PrecioUnitario) {
        this.errores.push("El precio es obligatorio.");
      }
      if (this.itemsMP.Cantidad < 0) {
        this.errores.push("La cantidad no puede ser menor a cero.");
      }

      if (!this.errores.length) {
        this.arrayItemMP.push({
          id: this.itemsMP.idProducto,
          nombre: this.itemsMP.buscarP,
          cantidad: this.itemsMP.Cantidad,
          precio: this.PrecioUnitario,
          monto: this.itemsMP.Monto,
          igv: this.calcularIGV(this.itemsMP.Igv, this.PrecioUnitario),
          total: this.itemsMP.Cantidad * this.PrecioUnitario,
        });
        this.itemTotal();
        this.itemTotalIGV();
        this.clearFormModal();
      }
    },

    cancelFormModal() {
      this.clearFormModal();
      this.openModal = false;
    },

    clearFormModal() {
      (this.itemsMP.buscarP = ""),
        (this.itemsMP.Cantidad = 0),
        (this.PrecioUnitario = 0),
        (this.itemsMP.Monto = 0);
      (this.Stock = null), (this.UnidadMedida = null);
      this.errores = [];
    },
    calcularIGV(igvPorcenaje, itemPrecio) {
      return Number.parseFloat(
         (itemPrecio*igvPorcenaje/100).toFixed(2)
      );
    },
    removeList(index) {
      this.arrayItemMP.splice(index, 1);
      this.itemTotal();
      this.itemTotalIGV();
      this.clearFormModal();
    },

    itemTotal() {
      this.form.Total = Number.parseFloat(
        this.arrayItemMP.length > 0
          ? this.arrayItemMP.reduce((result, item) => {
              return result + item.total;
            }, 0)
          : 0
      ).toFixed(2);
    },
    itemTotalIGV() {
      this.form.Impuesto = Number.parseFloat(
        this.arrayItemMP.length > 0
          ? this.arrayItemMP.reduce((result, item) => {
              return result + item.igv * item.cantidad;
            }, 0)
          : 0
      ).toFixed(2);
    },

    selectProveedor(UserID, ProvedorID, provNombre, provRuc) {
      this.form.user_id = UserID;
      this.form.persona_id = ProvedorID;
      this.provNombre = provNombre;
      this.provRuc = provRuc;
    },

    submit() {
      this.$inertia.post(route("ingresos.store"), [
        this.form,
        this.arrayItemMP,
      ]);
    },

    toggleProfileMenu() {
      this.isProfileMenuOpen = !this.isProfileMenuOpen;
    },
    closeProfileMenu() {
      this.isProfileMenuOpen = false;
    },
    setBuscarP(productoID, buscarp, stockp, unidadMediadP, precioU) {
      this.itemsMP.idProducto = productoID;
      this.itemsMP.buscarP = buscarp;
      this.Stock = stockp;
      this.UnidadMedida = unidadMediadP;
      this.PrecioUnitario = precioU;

      this.dropProductos = false;
    },
  },
  computed: {
    comparartabla() {
      return this.arrayItemMP.findIndex(
        (producto) => producto.id === this.itemsMP.idProducto
      );
    },
    resultQuery() {
      if (this.buscar) {
        return this.proveedores.filter((item) => {
          return this.buscar
            .toLowerCase()
            .split(" ")
            .every((v) => item.Nombres.toLowerCase().includes(v));
        });
      } else {
        return this.proveedores;
      }
    },
    resultProductos() {
      if (this.itemsMP.buscarP) {
        return this.productos.filter((item) => {
          return this.itemsMP.buscarP
            .toLowerCase()
            .split(" ")
            .every((v) => item.Nombre.toLowerCase().includes(v));
        });
      } else {
        return this.productos;
      }
    },

    calcularMonto() {
      this.itemsMP.Monto = this.itemsMP.Cantidad * this.PrecioUnitario;

      return this.itemsMP.Monto;
    },
    igvVariando() {
      return (this.igvVariado = this.itemsMP.Igv);
    },
  },
};
</script>
