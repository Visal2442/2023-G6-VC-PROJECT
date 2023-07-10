<template>
    <v-btn :class="type" outlined rounded="lg">
        <slot></slot>
    </v-btn>
</template>

<script setup>
import { defineProps } from 'vue';

defineProps({
    type:String,
})

</script>

<style scoped>
.seconday-btn {
  border: 1px solid #00E676;
  margin-left: 2px;
}

</style>