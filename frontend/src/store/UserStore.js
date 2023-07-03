import { defineStore } from "pinia"
import { ref, computed } from 'vue';

export const userStore = defineStore('user',()=>{
    const username = ref('Visal')
    
    const newName = computed(()=>{
        return username.value += ' boy loy'
    })

    return {
        username,
        newName
    };
})