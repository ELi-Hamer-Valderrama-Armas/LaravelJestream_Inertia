<template>
  <app-layout>
    <div class="container grid pt-8 pb-3 px-2 mx-auto">
      <div class="mb-8 rounded-lg dark:bg-gray-900">
        <h2
          class="py-3 sm:px-4 lg:px-6 text-xl font-semibold text-gray-700 dark:text-gray-200"
        >
          Inicio
        </h2>

        <div class="max-w-7xl mx-auto sm:px-4 lg:px-6">
          <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <!-- Card -->
            <div
              class="flex items-center p-4 bg-white rounded-lg border border-white dark:border-gray-800 dark:bg-gray-800"
            >
              <div
                class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full dark:text-yellow-100 dark:bg-yellow-500"
              >
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                  ></path>
                </svg>
              </div>
              <div>
                <p
                  class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                >
                  Total Clientes
                </p>
                <p
                  class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                >
                  {{ TotalClientes }}
                </p>
              </div>
            </div>
            <!-- Card -->
            <div
              class="flex items-center p-4 bg-white rounded-lg border border-white dark:border-gray-800 dark:bg-gray-800"
            >
              <div
                class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
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
                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                  ></path>
                </svg>
              </div>
              <div>
                <p
                  class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                >
                  Total Proveedores
                </p>
                <p
                  class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                >
                  {{ TotalProveedores }}
                </p>
              </div>
            </div>
            <!-- Card -->
            <div
              class="flex items-center p-4 bg-white rounded-lg border border-white dark:border-gray-800 dark:bg-gray-800"
            >
              <div
                class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500"
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
                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
                  ></path>
                </svg>
              </div>
              <div>
                <p
                  class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                >
                  Total Ingresos
                </p>
                <p
                  class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                >
                  {{ TotalIngresos }}
                </p>
              </div>
            </div>
            <!-- Card -->
            <div
              class="flex items-center p-4 bg-white rounded-lg border border-white dark:border-gray-800 dark:bg-gray-800"
            >
              <div
                class="p-3 mr-4 text-red-500 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-500"
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
              <div>
                <p
                  class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                >
                  Total Salidas
                </p>
                <p
                  class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                >
                  {{ TotalSalidas }}
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- Charts -->
        <h2
          class="my-6 text-lg m:px-4 lg:px-6 font-semibold text-gray-700 dark:text-gray-200"
        >
          Estadísticas
        </h2>

        <div class="grid sm:px-4 lg:px-6 gap-6 mb-2 md:grid-cols-2">
          <div
            class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
          >
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
              Proxímos productos en agotarse
            </h4>

            <MonthlyChart  v-bind:chartData="estadoProdA.chartData"></MonthlyChart>

          </div>

          <div
            class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
          >
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
              Resumen mensual del año
            </h4>
            <ScatterChart v-bind:chartData="estadoResumenM.chartData"></ScatterChart>
          </div>
        </div>
      </div>
    </div>
    
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import MonthlyChart from "@/Jetstream/MonthlyChart.vue";
import ScatterChart from "@/Jetstream/ScatterChart.vue";
import moment from "moment";
export default {
  components: {
    AppLayout,
    MonthlyChart,
    ScatterChart,
  },
  props: {
    TotalIngresos: Array,
    TotalClientes: Array,
    TotalProveedores: Array,
    TotalSalidas: Array,
    SalidaAño: Array,
    IngresosAño: Array,
    ProductosAgotarse: Object,
  },
  data() {
    return {
      estadoResumenM: {
        chartData: {},
        chartOptions: {
          responsive: true,
        },
      },
      estadoProdA: {
        chartData: {},
        chartOptions: {
          responsive: false,
        },
      },
    };
  },
  beforeMount() {
    this.ResumenMes(),this.ProductAgotarse();
  },
  methods: {
    ResumenMes() {
      this.estadoResumenM.chartData = {
        labels: this.llenarLabelSalAño(),

        datasets: [
          {
            label: "Salidas",
            backgroundColor: "#f87979",
            borderColor: "#f87979",
            borderWidth: 2,
            data: this.llenarDataSalAño(),
          },
           {
            label: "Ingresos",
            backgroundColor: "#7C3AED",
            borderColor: "#7C3AED",
            borderWidth: 2,
            data: this.llenarDataIngAño(),
          },
        ],
      };
    },
 
     ProductAgotarse() {
      this.estadoProdA.chartData = {
        labels: this.llenarLabelProdAg(),

        datasets: [
          {
            label: "Stock",
            backgroundColor: "#FFFFFF00",
            borderColor: "#7C3AED",
            borderWidth: 2,
            data: this.llenarDataProdAg(),
          },
        ],
      };
    },

    llenarLabelProdAg() {
      let datosP = [];
      Object.keys(this.ProductosAgotarse).forEach((e) => {
        datosP.push(this.ProductosAgotarse[e].Nombre);
      });
      return datosP;
    },
    llenarDataProdAg() {
      let datosP = [];
      Object.keys(this.ProductosAgotarse).forEach((e) => {
        datosP.push(this.ProductosAgotarse[e].Stock);
      });
      return datosP;
    },
     llenarLabelSalAño() {
      let datosP = [];
      Object.keys(this.SalidaAño.original).forEach((e) => {
        datosP.push(this.SalidaAño.original[e].month);
      });
      return datosP;
    },
    llenarDataSalAño() {
      let datosP = [];
      Object.keys(this.SalidaAño.original).forEach((e) => {
        datosP.push(this.SalidaAño.original[e].count);
      });
      return datosP;
    },
     llenarDataIngAño() {
      let datosP = [];
      Object.keys(this.IngresosAño.original).forEach((e) => {
        datosP.push(this.IngresosAño.original[e].count);
      });
      return datosP;
    },
  },
};
</script>
