<template>
     <div class="search">
          <div class="research">
               <input type="text">
               <v-icon size="large" color="white" icon="mdi mdi-magnify"></v-icon>
          </div>
     </div>
</template>

<script>
export default {

}
</script>

<style scoped>
.search {
     /* background: #d62a2a; */
     display: flex;
     justify-content: center;
     align-content: center;

     margin-top: -40%;
     margin-bottom: 40%;

}

.research {
     width: 50%;
     /* background: #85c60d; */
}

.research input {
     background: #e2dedec6;
     width: 80%;
     padding: 10px;
     border-radius: 5px 0 0 5px;


}

.v-icon {
     background: orange;
     padding: 22px;
     border-radius: 0 5px 5px 0;
     margin-bottom: 3px;


}
</style>