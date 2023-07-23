<template>
    <div>
        <v-container fluid>
            <v-row class="pa-1">
                <v-col>
                    <v-sheet elevation="5" class=" pa-5 w-100" rounded="lg">
                        <table class=" w-100">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>UserInfo</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#1</td>
                                    <td>
                                        <div class="d-flex align-center">
                                            <v-avatar>
                                                <v-img :src="require('../assets/profile2.jpeg')" width="60"></v-img>
                                            </v-avatar>
                                            <div class=" ml-2">
                                                <p class="font-weight-bold">Visal</p>
                                                <v-card-subtitle class="pa-0">visal@gmail.com</v-card-subtitle>
                                            </div>
                                        </div>
                                    </td>
                                    <td>+855 929292</td>
                                    <td>
                                        <div class="d-flex">
                                            <v-card-subtitle class="pa-0 bg-green-lighten-4 text-green-darken-1 px-2 py-1 rounded-xl font-weight-bold">Landlord</v-card-subtitle>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-center">
                                            <v-icon class="mdi mdi-pencil-outline mr-3" size="small" color="blue-accent-4">
                                                <v-tooltip activator="parent" location="top">Edit</v-tooltip>
                                            </v-icon>
                                            <v-icon class="mdi mdi-trash-can-outline" size="small" color="red">
                                                <v-tooltip activator="parent" location="top">Delete</v-tooltip>
                                            </v-icon>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </v-sheet>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script setup>


</script>

<style scoped>
table,
th,
td {
    /* border: none; */
    border-collapse: collapse;
}

thead th {
    border-bottom: 1px solid #b8b2b2;
    padding: 10px;
    text-align: start;
}

tbody td {
    border-bottom: 1px solid #b8b2b2;
    padding: 10px;
}
</style>