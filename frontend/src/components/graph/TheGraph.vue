
<template>
    <v-row class="my-16 d-flex flex-column" align="center">
      <h1 id="h1-home">Data Of Houses</h1>
    </v-row>
     <Bar
       id="my-chart-id"
       :options="chartOptions"
       :data="chartData"
     />

   </template>

   
   
   <script>
   import { Bar } from 'vue-chartjs'
   import 'chartjs-plugin-datalabels';
   import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js';
   
   ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)
   export default {
  name: 'BarChart',
  components: { Bar },
  data() {
    return {

          chartData: {
     labels: ['Khan kamboul', 'Khan Camkar', 'Khan Chbar Ampov', 'Khan Mean Chey', 'Khan Pou Senchey', 'Khan Pramir Makara', 'Khan Sen Sok', 'Khan Tuol', 'Khan Mean Chey', 'Khan Tuol', 'Khan Mean Chey', 'Khan Tuol', 'Khan Mean Chey'],
     datasets: [{
     label: 'Data',
     data: [12, 17, 3, 5, 2, 3, 4, 7, 8, 12],
     backgroundColor: [
          'green',
          'red',
          'orange',
          'blue',
          'brown',
          'purple',
          '#A44444',
          '#A4AAA4',
          '#A44454',
     ],
     }],
     },

     chartOptions: {
  plugins: {
    datalabels: {
      display: true,
      color: 'white',
      backgroundColor: 'rgba(0, 0, 0, 0.5)',
      borderColor: 'black',
      anchor: 'end',
      align: 'top',
      offset: -10,
      formatter: function(context) {
        return context.dataset.data[context.dataIndex];
      },
    },
  },
  responsive: true,
},
     
    };
  },
};
   
</script>
     <style>
     #h1-home {
     margin: 20px 16px 0 0;
     border-bottom: 3px solid #00E676;
     }
</style>