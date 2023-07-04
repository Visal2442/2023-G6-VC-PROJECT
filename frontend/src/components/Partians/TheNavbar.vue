<template>

    <!-- Small Screen  -->
    <!-- <v-navigation-drawer>
        <v-list>
            <v-list-item>
                <v-list-item-title>
                    Home
                </v-list-item-title>
            </v-list-item>
        </v-list>
    </v-navigation-drawer> -->

    <!-- Large Screen  -->
   
    <v-toolbar color="green lighten-1" class="" >
      <v-toolbar-title class="text-uppercase font-weight-bold mr-4 ">
         
          <picture>
           
            <img src="../../assets/logo.png" alt="Logo" width="50" aspect-ratio="1/1">
          </picture>
        </v-toolbar-title>
        <v-spacer></v-spacer>
        <v-btn class="mr-4" text>
        
          Home
        </v-btn>
        <v-btn class="mr-4" text>
          
          Product
        </v-btn>
        <v-btn class="mr-4" text>
        
          About
        </v-btn>
        <v-contain>

          <v-btn class="tex-left" text>
           
            Register
          </v-btn>
          <v-btn class="mr-4" text>
           
            Login
          </v-btn>
        </v-contain>
    </v-toolbar>
 

</template>

<script>
  
export default {

}
</script>

<style scoped>

img{
  border-radius: 50%;
  margin-right: 70%;
  margin-top: 3%;
}

</style>