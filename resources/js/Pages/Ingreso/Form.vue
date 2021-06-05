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
            <div class="flex justify-between">
              <h2
                class="my-2 text-2xl font-semibold text-gray-700 dark:text-gray-200 mb-6 pb-2"
              >
                Nuevo Ingreso
              </h2>

              <div>
                <div class="relative mr-4 inline-block">
                  <div
                    class="text-gray-500 cursor-pointer w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-300 inline-flex items-center justify-center"
                    @click="printInvoice()"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="icon icon-tabler icon-tabler-printer"
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      stroke-width="2"
                      stroke="currentColor"
                      fill="none"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    >
                      <rect
                        x="0"
                        y="0"
                        width="24"
                        height="24"
                        stroke="none"
                      ></rect>
                      <path
                        d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2"
                      />
                      <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                      <rect x="7" y="13" width="10" height="8" rx="2" />
                    </svg>
                  </div>
                </div>

                <div class="relative inline-block">
                  <div
                    class="text-gray-500 cursor-pointer w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-300 inline-flex items-center justify-center"
                    @click="window.location.reload()"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="icon icon-tabler icon-tabler-refresh"
                      width="24"
                      height="24"
                      viewBox="0 0 24 24"
                      stroke-width="2"
                      stroke="currentColor"
                      fill="none"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    >
                      <rect
                        x="0"
                        y="0"
                        width="24"
                        height="24"
                        stroke="none"
                      ></rect>
                      <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -5v5h5" />
                      <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 5v-5h-5" />
                    </svg>
                  </div>
                </div>
              </div>
            </div>

            <div class="flex mb-4 justify-between">
              <div class="w-2/0">
                <div class="mb-2 md:mb-1 md:flex items-center">
                  <jet-label
                    class="-mt-2 w-32 -mb-1 text-xm"
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
                      autofocus="true"
                    >
                      <option value="Factura">Factura</option>
                      <option value="Boleta">Boleta</option>
                      <option value="Guía de Remisión">Guía de Remisión</option>
                      <option value="Acta de entrega">Acta de Entrega</option>
                    </select>
                    <div
                      v-if="errors.TipoComprobante"
                      class="text-xs px-4 py-2 text-red-400 dark:text-red-400"
                    >
                      El Tipo de Comprobante es requerido
                    </div>
                  </div>
                </div>

                <div class="mb-2 md:mb-1 md:flex items-center">
                  <jet-label
                    class="-mt-2 w-32 -mb-1 text-xm"
                    for="Fecha"
                    value="Fecha"
                  />
                  <span
                    class="mr-4 inline-block hidden md:block text-gray-700 dark:text-gray-300"
                    >:</span
                  >
                  <div class="flex-1">
                    <jet-input
                      id="Fecha"
                      type="date"
                      class="mt-1 block w-full"
                      v-model="form.Fecha"
                      placeholder="01/02/2021"
                      autocomplete="off"
                    />
                    <div
                      v-if="errors.Fecha"
                      class="px-4 py-2 text-xs py-2 text-red-400 dark:text-red-400"
                    >
                      Fecha es requerido
                    </div>
                  </div>
                </div>
              </div>
              <div class="w-2/0">
                <div class="mb-2 md:mb-1 md:flex items-center">
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
                      placeholder="01/02/2021"
                      autocomplete="off"
                    />
                    <div
                      v-if="errors.SerieComprobante"
                      class="px-4 py-2 text-xs py-2 text-red-400 dark:text-red-400"
                    >
                      La serie es requerido
                    </div>
                  </div>
                </div>
                <div class="mb-2 md:mb-1 md:flex items-center">
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
                      placeholder="0001"
                      autocomplete="off"
                    />
                    <div
                      v-if="errors.NumeroComprobante"
                      class="px-4 py-2 text-xs py-2 text-red-400 dark:text-red-400"
                    >
                      El número es requerido
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="flex justify-between mb-3">
              <div class="w-full md:w-1/3 mb-2 md:mb-0">
                <label
                  class="text-gray-700 dark:text-gray-300 block mb-1 font-bold text-sm uppercase"
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
                  </tbody>
                </table>
              </div>

              <div class="w-full md:w-1/3">
                <div
                  class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-yellow-400 rounded shadow ripple hover:shadow-lg hover:bg-yellow-500 focus:outline-none"
                  @click="openModal = !openModal"
                >
                  Producto
                </div>

                <div class="relative">
                  <div class="my-2 flex">
                    <div
                      class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-green-400 rounded shadow ripple hover:shadow-lg hover:bg-green-500 focus:outline-none"
                      @click="toggleProfileMenu"
                      @keydown.escape="closeProfileMenu"
                    >
                      Proveedor
                    </div>
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
                            <div class="mx-2 mt-1">
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
                                      class="text-xs text-left truncate w-full normal-case font-normal -mt-1 text-gray-500 dark:text-gray-400"
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

            <div
              class="flex -mx-1 border-b py-2 items-start shadow overflow-hidden border-b border-gray-200 sm:rounded-lg dark:border-gray-700 dark:divide-gray-700 text-gray-500 border-bdark:border-gray-700 bg-gray-100 dark:text-gray-400 dark:bg-gray-700"
            >
              <div class="flex-1 px-1">
                <p
                  class="text-gray-700 dark:text-gray-300 text-xs tracking-wide uppercase font-semibold"
                >
                  Producto
                </p>
              </div>

              <div class="px-2S w-20 text-right">
                <p
                  class="text-gray-700 dark:text-gray-300 text-xs tracking-wide uppercase semi-bold"
                >
                  Cantidad
                </p>
              </div>

              <div class="px-1 w-32 text-right">
                <p class="leading-none">
                  <span
                    class="text-xs tracking-wide uppercase semi-bold text-gray-700 dark:text-gray-300"
                  >
                    Precio
                  </span>
                  <span class="text-xs text-gray-700 dark:text-gray-300"
                    >(Incl. IGV)</span
                  >
                </p>
              </div>

              <div class="px-1 w-32 text-right">
                <p class="leading-none">
                  <span
                    class="text-xs tracking-wide uppercase semi-bold text-gray-700 dark:text-gray-300"
                    >Monto
                  </span>
                  <span class="text-xs text-gray-700 dark:text-gray-300"
                    >(Incl. IGV)</span
                  >
                </p>
              </div>

              <div class="px-1 w-20 text-center"></div>
            </div>

            <template v-for="(itemsProd, index) in arrayItemMP" :key="index">
              <div class="flex -mx-1 py-2 border-b">
                <div class="flex-1 px-1">
                  <p class="text-gray-700 dark:text-gray-300">
                    {{ itemsProd.nombre }}
                  </p>
                </div>

                <div class="px-1 w-20 text-right">
                  <p class="text-gray-700 dark:text-gray-300">
                    {{ itemsProd.cantidad }}
                  </p>
                </div>

                <div class="px-1 w-32 text-right">
                  <p class="text-gray-700 dark:text-gray-300">
                    {{ itemsProd.precio }}
                  </p>
                </div>

                <div class="px-1 w-32 text-right">
                  <p class="text-gray-700 dark:text-gray-300">
                    {{ itemsProd.monto }}
                  </p>
                </div>

                <div class="px-1 w-20 text-right">
                  <a
                    href="#"
                    class="text-red-500 hover:text-red-600 text-sm font-semibold"
                    @click="removeList(index)"
                    >Eliminar</a
                  >
                </div>
              </div>
            </template>

            <div class="py-2 ml-auto mt-5 w-full sm:w-2/4 lg:w-1/4">
              <div class="flex justify-between mb-3">
                <div class="text-gray-700 dark:text-gray-300 text-right flex-1">
                  Total incl. IGV
                </div>
                <div class="text-right w-40">
                  <div class="text-gray-700 dark:text-gray-300 font-medium">
                    {{ form.Total }}
                  </div>
                </div>
              </div>
              <div class="flex justify-between mb-4">
                <div class="text-gray-700 dark:text-gray-400 text-right flex-1">
                  IGV({{ igvVariando }}%) incl. Total
                </div>
                <div class="text-right w-40">
                  <div class="text-gray-600 dark:text-gray-400">
                    {{ form.Impuesto }}
                  </div>
                </div>
              </div>

              <div class="py-2 border-t border-b">
                <div class="flex justify-between">
                  <div
                    class="text-gray-700 dark:text-gray-300 text-right flex-1"
                  >
                    Monto Total
                  </div>
                  <div class="text-right w-40">
                    <div
                      class="text-xl text-gray-700 dark:text-gray-300 font-bold"
                    >
                      {{ form.Total }}
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Print Template -->
            <div id="js-print-template" x-ref="printTemplate" class="hidden">
              <div class="mb-8 flex justify-between">
                <div>
                  <h2
                    class="text-3xl font-bold mb-6 pb-2 tracking-wider uppercase"
                  >
                    Invoice
                  </h2>

                  <div class="mb-1 flex items-center">
                    <label
                      class="w-32 text-gray-800 block font-bold text-xs uppercase tracking-wide"
                      >Invoice No.</label
                    >
                    <span class="mr-4 inline-block">:</span>
                    <div x-text="invoiceNumber"></div>
                  </div>

                  <div class="mb-1 flex items-center">
                    <label
                      class="w-32 text-gray-800 block font-bold text-xs uppercase tracking-wide"
                      >Invoice Date</label
                    >
                    <span class="mr-4 inline-block">:</span>
                    <div x-text="invoiceDate"></div>
                  </div>

                  <div class="mb-1 flex items-center">
                    <label
                      class="w-32 text-gray-800 block font-bold text-xs uppercase tracking-wide"
                      >Due date</label
                    >
                    <span class="mr-4 inline-block">:</span>
                    <div x-text="invoiceDueDate"></div>
                  </div>
                </div>
                <div class="pr-5">
                  <div class="w-32 h-32 mb-1 overflow-hidden">
                    <img id="image2" class="object-cover w-20 h-20" />
                  </div>
                </div>
              </div>

              <div class="flex justify-between mb-10">
                <div class="w-1/2">
                  <label
                    class="text-gray-800 block mb-2 font-bold text-xs uppercase tracking-wide"
                    >Bill/Ship To:</label
                  >
                  <div>
                    <div x-text="billing.name"></div>
                    <div x-text="billing.address"></div>
                    <div x-text="billing.extra"></div>
                  </div>
                </div>
                <div class="w-1/2">
                  <label
                    class="text-gray-800 block mb-2 font-bold text-xs uppercase tracking-wide"
                    >From:</label
                  >
                  <div>
                    <div x-text="from.name"></div>
                    <div x-text="from.address"></div>
                    <div x-text="from.extra"></div>
                  </div>
                </div>
              </div>

              <div class="flex flex-wrap -mx-1 border-b py-2 items-start">
                <div class="flex-1 px-1">
                  <p
                    class="text-gray-700 dark:text-gray-300 uppercase tracking-wide text-xs font-bold"
                  >
                    Description
                  </p>
                </div>

                <div class="px-1 w-32 text-right">
                  <p
                    class="text-gray-600 uppercase tracking-wide text-xs font-bold"
                  >
                    Units
                  </p>
                </div>

                <div class="px-1 w-32 text-right">
                  <p class="leading-none">
                    <span
                      class="block uppercase tracking-wide text-xs font-bold text-gray-600"
                      >Unit Price</span
                    >
                    <span class="font-medium text-xs text-gray-500"
                      >(Incl. GST)</span
                    >
                  </p>
                </div>

                <div class="px-1 w-32 text-right">
                  <p class="leading-none">
                    <span
                      class="block uppercase tracking-wide text-xs font-bold text-gray-600"
                      >Amount</span
                    >
                    <span class="font-medium text-xs text-gray-500"
                      >(Incl. GST)</span
                    >
                  </p>
                </div>
              </div>
              <template x-for="invoice in items">
                <div class="flex flex-wrap -mx-1 py-2 border-b">
                  <div class="flex-1 px-1">
                    <p class="text-gray-800" x-text="invoice.name"></p>
                  </div>

                  <div class="px-1 w-32 text-right">
                    <p class="text-gray-800" x-text="invoice.qty"></p>
                  </div>

                  <div class="px-1 w-32 text-right">
                    <p
                      class="text-gray-800"
                      x-text="numberFormat(invoice.rate)"
                    ></p>
                  </div>

                  <div class="px-1 w-32 text-right">
                    <p
                      class="text-gray-800"
                      x-text="numberFormat(invoice.total)"
                    ></p>
                  </div>
                </div>
              </template>

              <div class="py-2 ml-auto mt-20" style="width: 320px;">
                <div class="flex justify-between mb-3">
                  <div class="text-gray-800 text-right flex-1">
                    Total incl. IGV
                  </div>
                  <div class="text-right w-40">
                    <div
                      class="text-gray-800 font-medium"
                      x-html="netTotal"
                    ></div>
                  </div>
                </div>
                <div class="flex justify-between mb-4">
                  <div class="text-sm text-gray-600 text-right flex-1">
                    GST(18%) incl. in Total
                  </div>
                  <div class="text-right w-40">
                    <div class="text-sm text-gray-600" x-html="totalGST"></div>
                  </div>
                </div>

                <div class="py-2 border-t border-b">
                  <div class="flex justify-between">
                    <div
                      class="text-gray-700 dark:text-gray-300 text-right flex-1"
                    >
                      Monto total
                    </div>
                    <div class="text-right w-40">
                      <div
                        class="text-xl text-gray-800 font-bold"
                        x-html="netTotal"
                      ></div>
                    </div>
                  </div>
                </div>
              </div>
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
                Añadir Producto
              </p>
              <div
                class="text-gray-400 hover:text-gray-800 dark:hover:text-gray-300"
                @click="openModal = !openModal"
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

            <div class="flex flex-col px-6 dark:text-gray-400 dark:bg-gray-800">
              <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8">
                <div class="grid grid-cols-1">
                  <div>
                    <div class="relative">
                      <div class="flex">
                        <div>
                          <jet-label for="Producto" value="Producto" />
                          <div class="flex w-full items-center relative">
                            <div class="w-full items-center flex">
                              <div class="mt-1">
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
                                  placeholder="Buscar Nombre"
                                  type="search"
                                  v-model="itemsMP.buscarP"
                                  reqruired
                                  @focus="dropProductos = true"
                                  class="px-8 mb-1 w-full"
                                />
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div v-if="dropProductos" class="absolute shadow top-100">
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
                                    producto.UnidadMedida
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
                </div>
                <div class="grid grid-cols-1">
                  <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8">
                    <div class="grid grid-cols-1">
                      <div>
                        <jet-label
                          for="StokActual"
                          v-model="itemsMP.idProducto"
                          value="Stok Actual"
                        />
                        <jet-input
                          id="StokActual"
                          type="number"
                          step="0"
                          class="mt-1 block w-full"
                          v-model="Stock"
                          disabled
                        />
                      </div>
                    </div>
                    <div class="grid grid-cols-1">
                      <div>
                        <jet-label for="UnidadMedida" value="Unidad Medida" />
                        <jet-input
                          id="UnidadMedida"
                          type="text"
                          class="mt-1 block w-full"
                          v-model="UnidadMedida"
                          disabled
                        />
                      </div>
                    </div>
                    <div
                      v-if="errors.Stock"
                      class="text-xs px-4 py-2 text-red-400 dark:text-red-400"
                    >
                      El Precio Venta es requerido
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
                    <jet-label for="Cantidad" value="Cantidad" />
                    <jet-input
                      id="Cantidad"
                      type="number"
                      required
                      class="mt-1 block w-full"
                      v-model="itemsMP.Cantidad"
                      placeholder="0.00"
                      autocomplete="off"
                    />
                  </div>
                </div>
                <div class="grid grid-cols-1">
                  <div>
                    <jet-label for="PrecioUnitario" value="Precio Unitario" />
                    <jet-input
                      id="PrecioUnitario"
                      type="number"
                      required
                      class="mt-1 block w-full"
                      v-model="itemsMP.PrecioUnitario"
                      placeholder="0.00"
                      autocomplete="off"
                    />
                  </div>
                </div>

                <div class="grid grid-cols-1">
                  <div>
                    <jet-label for="Monto" value="Monto" />
                    <jet-input
                      id="Monto"
                      type="number"
                      class="mt-1 block w-full"
                      v-model="calcularMonto"
                      placeholder="0.00"
                      disabled
                    />
                  </div>
                </div>
              </div>
              <div class="grid grid-cols-1 md:grid-cols-3 md:gap-8">
                <div class="mb-4">
                  <jet-label for="IGV" value="IGV" />
                  <jet-input
                    id="IGV"
                    type="number"
                    step="0.00"
                    class="mt-1 block w-full"
                    v-model="itemsMP.Igv"
                    placeholder="18 "
                    autocomplete="off"
                  />
                </div>
              </div>
            </div>
            <div
              class="flex flex-col justify-end px-6 py-4 bg-gray-100 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row text-right bg-gray-50 dark:bg-gray-700"
            >
              <button
                @click="openModal = !openModal"
                class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray"
              >
                Cancelar
              </button>
              <button
                class="w-full px-5 text-center py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                value="addItemMP"
                @click="addItemMP()"
              >
                Agregar
              </button>
            </div>
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
import JetLabel from "@/Jetstream/Label";
import JetModal from "@/Jetstream/Modal";
import pickBy from 'lodash/pickBy'
import JetPagination from "@/Jetstream/Pagination";

export default {
  components: {
    AppLayout,
    JetButton,
    JetInput,
    JetLabel,
    JetModal,
    JetPagination,
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
        Fecha: null,
        TipoComprobante: null,
        SerieComprobante: null,
        NumeroComprobante: null,
        Impuesto: 0,
        Total: 0,
        persona_id: null,
        user_id: null,
      },
      //product modal
      Stock: null,
      UnidadMedida: null,
      dropProductos: false,
      filterBuscarPr: [],

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
        PrecioUnitario: 0,
        Monto: 0,
        Igv: 18,
        Total: 0,
      },
      igvVariado: 18,
      openModal: false,
    };
  },
  methods: {
    addItemMP() {
      this.arrayItemMP.push({
        id: this.itemsMP.idProducto,
        nombre: this.itemsMP.buscarP,
        cantidad: this.itemsMP.Cantidad,
        precio: this.itemsMP.PrecioUnitario,
        monto: this.itemsMP.Monto,
        igv: this.calcularIGV(this.itemsMP.Igv, this.itemsMP.PrecioUnitario),
        total: this.itemsMP.Cantidad * this.itemsMP.PrecioUnitario,
      });
      this.itemTotal();
      this.itemTotalIGV();
      this.clearFormModal();
    },

    clearFormModal() {
      (this.itemsMP.buscarP = ""),
        (this.itemsMP.Cantidad = 0),
        (this.itemsMP.PrecioUnitario = 0),
        (this.itemsMP.Monto = 0);
      (this.Stock = null), (this.UnidadMedida = null);
    },
    calcularIGV(igvPorcenaje, itemPrecio) {
      return Number.parseFloat(
        (itemPrecio - itemPrecio * (100 / (100 + igvPorcenaje))).toFixed(2)
      );
    },
    removeList(index) {
      this.arrayItemMP.splice(index, 1);
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
     
       this.$inertia.post(route("ingresos.store"), [this.form, this.arrayItemMP]);
       
    },

    toggleProfileMenu() {
      this.isProfileMenuOpen = !this.isProfileMenuOpen;
    },
    closeProfileMenu() {
      this.isProfileMenuOpen = false;
    },
    setBuscarP(productoID, buscarp, stockp, unidadMediadP) {
      this.itemsMP.idProducto = productoID;
      this.itemsMP.buscarP = buscarp;
      this.Stock = stockp;
      this.UnidadMedida = unidadMediadP;

      this.dropProductos = false;
    },
  },
  computed: {
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
      this.itemsMP.Monto = this.itemsMP.Cantidad * this.itemsMP.PrecioUnitario;

      return this.itemsMP.Monto;
    },
    igvVariando() {
      return (this.igvVariado = this.itemsMP.Igv);
    },
  },
};
</script>
