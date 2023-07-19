<template>
    <nav>
        <v-navigation-drawer id="sidebar" v-model="drawer" class="pa-5">
            <v-list-item>
                <v-img :src="require('../../assets/logo-transparent.png')" class="mb-7 mt-2"></v-img>
            </v-list-item>
            <v-divider></v-divider>
            <v-list flat>
                <v-list-item prepend-icon="mdi-home" title="Dashboard" router :to="{ name: 'Dashboard' }"></v-list-item>
                <v-list-item prepend-icon="mdi-home-plus" title="Add Property" router :to="{ name: 'Post' }"></v-list-item>
                <v-list-item prepend-icon="mdi-account-group-outline" title="Your Properties"></v-list-item>
            </v-list>
        </v-navigation-drawer>
    </nav>

</template>

<script setup>
import { ref } from 'vue';
const drawer = ref(true);

</script>

<style scoped>
#navbar {
    position: sticky;
    top: 0;
    z-index: 2000;
}

#sidebar {
    position: static;
}
.v-list-item--active{
    /* background: #00E676; */
    color: #00E676;
}
</style>