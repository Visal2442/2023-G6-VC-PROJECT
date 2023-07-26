import { defineStore } from "pinia";
import { ref } from 'vue';
import axios from 'axios';

export const useGraphStore = defineStore('graph', () => {
  const url=ref('/getDataGrap');
// RESOURCE GRAPH: https://www.chartjs.org/
  let chartData=ref( {
        labels: [],
        datasets: [{
          label: '',
          data: [],
        }],
      });

      axios.get(url.value).then((response) =>{
          const data = response.data.data;
          if (data) {
            const labels = [];
            const values = [];
    
            data.forEach(element => {
              labels.push(element.name);
              values.push(element.property_count);
            });
            chartData.value = {
              labels: labels,
              datasets: [
                {
                  label: "Count of property",
                  backgroundColor: [
                      'green',
                      'red',
                      'orange',
                      'yellow',
                ],
                  data: values
                }
              ]
            };
    
          } else {
            console.log("NO DATA");
          }
          })
          ;

    return {
     chartData
    }
});