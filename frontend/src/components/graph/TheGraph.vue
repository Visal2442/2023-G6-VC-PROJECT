
<template>
    <v-row class="my-16 d-flex flex-column" align="center">
      <h1 id="h1-home">Most Rent District</h1>
    </v-row>
    <Bar id="my-chart-id" :data="chartData" />
</template>


<script setup>
// RESOURCE GRAPH: https://www.chartjs.org/
import { Bar } from 'vue-chartjs'
import 'chartjs-plugin-datalabels';
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js';
import { useGraphStore } from '../../store/GraphStore';
import { storeToRefs } from 'pinia';
const graphStore = useGraphStore();
const { chartData } = storeToRefs(graphStore);
ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

</script>
<style scoped>
#h1-home {
  margin: 20px 16px 0 0;
  border-bottom: 3px solid #00E676;
}
</style> 

