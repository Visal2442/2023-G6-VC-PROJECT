<template>
    <v-card class="mx-auto" elevation='0' max-width="400">
        <v-img class="align-end text-white" max-height="200" :src="property?.image">
            <v-card-title>{{ property?.name }}</v-card-title>
        </v-img>
        <v-card-subtitle class="pt-4">{{ distance }} KM</v-card-subtitle>
        <v-card-text>
            <div class=" mb-2">{{ property.district?.title }}, {{ property.district?.province?.name }} </div>
            <div> ${{ property?.price }}/Month</div>
        </v-card-text>

        <v-card-actions v-if="$slots.action">
            <v-btn class="text-green-accent-3" @click="getDetail(property.id)"><slot name="action"></slot></v-btn>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import { defineProps } from 'vue';
import { useRouter } from 'vue-router';
const router = useRouter();

defineProps(['property', 'distance']);

const getDetail = (property_id)=>{
    router.push(`/detail/${property_id}`);
}
</script>

<style scoped>
div .v-card-text:first-child {
    font-size: medium;

}

div .v-card-text:last-child {
    font-size: large;
    font-weight: bold;
}

#imgDetail {
    border-radius: 15px;
}

.v-card {
    border-radius: 10px;
}
</style>