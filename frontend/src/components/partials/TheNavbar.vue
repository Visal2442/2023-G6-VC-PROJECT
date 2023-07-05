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

  <v-toolbar color="green lighten-1" class="mb-5">
    <v-toolbar-title class="text-uppercase font-weight-bold mr-4 ">
      <picture>
        <img src="../../assets/logo.png" alt="Logo" width="50" aspect-ratio="1/1">
      </picture>
    </v-toolbar-title>
    <v-spacer></v-spacer>
    <v-toolbar-items>
      <v-btn class="mr-4" :to="{name:'Home'}">Home</v-btn>
      <v-btn class="mr-4" :to="{name:'Home'}">Property</v-btn>
      <v-btn class="mr-4" :to="{name:'About'}">About</v-btn>
    </v-toolbar-items>
    <!-- <v-contain> -->
      <v-btn class="tex-left" :to="{name:'Register'}">Register</v-btn>
      <v-btn class="mr-4" :to="{name:'Login'}">Login</v-btn>
    <!-- </v-contain> -->
  </v-toolbar>
</template>

<script>

export default {

}
</script>

<style scoped>
img {
  border-radius: 50%;
  margin-right: 70%;
  margin-top: 3%;
}
</style>