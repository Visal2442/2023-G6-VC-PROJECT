<template>
    <div>
        <dashboard-header></dashboard-header>
        <v-container fluid class=" my-5">
            <h1 class=" my-5">Your Properties</h1>
            <v-container class="" elevation="6">
                <v-row>
                    <table class="w-100">
                        <thead class="bg-green-accent-4">
                            <tr class="">
                                <th class="text-start">Name</th>
                                <th class="text-start">Price</th>
                                <th class="text-start">Size</th>
                                <th class="text-start">Floor</th>
                                <th class="text-start">Room</th>
                                <th class="text-start">Bathroom</th>
                                <th class="text-start">Kitchen</th>
                                <th class="text-start">Status</th>
                                <th class="text-start">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td>Luxury House</td>
                                <td>$500/Month</td>
                                <td>20m x 20m</td>
                                <td>3</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>Available</td>
                                <td>
                                    <div class=" d-flex align-center">
                                        <v-icon class="mdi mdi-pencil mr-1" size="small"></v-icon>
                                        <v-icon class="mdi mdi-delete" size="small" color="red"></v-icon>
                                    </div>
                                </td>
                            </tr>
                            <tr class="">
                                <td>Luxury House</td>
                                <td>$500/Month</td>
                                <td>20m x 20m</td>
                                <td>3</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>Available</td>
                                <td>
                                    <div class=" d-flex align-center">
                                        <v-icon class="mdi mdi-pencil mr-1" size="small"></v-icon>
                                        <v-icon class="mdi mdi-delete" size="small" color="red"></v-icon>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </v-row>
            </v-container>
        </v-container>
    </div>
</template>

<script setup>

</script>

<style scoped>
table,
th,
td {
    border: none;
    border-collapse: collapse;
}

thead th {
    padding: 10px;
}

tbody td {
    border-bottom: 1px solid #000;
    padding: 10px;
}
</style>