<template>
     <div class="price-type">
          <div class="select">

               <div class="price">
                    <select name="Price" id="price">
                         <option value="Select Price">Select Price</option>
                         <option value="200$">200$</option>
                         <option value="300$">300$</option>
                         <option value="400$">400$</option>
                         <option value="400$">400$</option>
                         <option value="400$">400$</option>
                         <option value="400$">400$</option>
                    </select>

               </div>
               <div class="type">
                    <select name="type" id="type" v-model="selected">
                         <option value="">Rent Type</option>
                         <option value="house">House Rent</option>
                         <option value="room">Room Rent</option>
                    </select>
               </div>
          </div>
     </div>
</template>

<script setup>
import { ref, watch , defineEmits} from 'vue';

const emit = defineEmits(['onSelect']);
const selected = ref('');

watch(selected, (value)=>{
     emit('onSelect', value);
})

</script>
<style scoped>
.price-type {
     display: flex;
     justify-content: center;
     align-items: center;
     /* margin-top: -38%; */
     /* margin-bottom: 35%; */
}

.select {

     display: flex;
     align-items: center;
     justify-content: space-evenly;
     width: 45%;
}

.price,
.type {
     width: 50%;
}

select {

     width: 95%;
     text-align: center;
     padding: 8px;
     background: white;
     border-radius: 5px;

}
</style>