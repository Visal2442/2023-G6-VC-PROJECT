<template>
    <v-toolbar id="navbar" class="bg-white py-5" elevation="3">
        <v-toolbar-title>
            <div class="d-flex align-center">
                <h4 class="">DASHBOARD</h4>
            </div>
        </v-toolbar-title>
        <v-spacer></v-spacer>
        <v-toolbar-items class="hidden-xs d-flex align-center pr-10">
            <v-toolbar-title class="mr-5">visal@gmail.com</v-toolbar-title>
            <v-avatar id="logged-in">
                <v-img :src="require('../../assets/profile2.jpeg')"></v-img>
            </v-avatar>
            <v-menu id="menu" activator="#logged-in">
                <v-list>
                    <v-list-item>
                        <v-btn variant="plain" :to="{ name: 'Post' }" prepend-icon="mdi mdi-login">Post</v-btn>
                    </v-list-item>
                    <v-list-item>
                        <v-btn variant="plain" :to="{ name: 'Login' }" prepend-icon="mdi mdi-account">Login</v-btn>
                    </v-list-item>
                </v-list>
            </v-menu>
        </v-toolbar-items>
    </v-toolbar>
</template>

<script>

</script>

<style scoped>
#navbar {
  position: sticky;
  top: 0;
  z-index: 2000;
}
</style>