<template>
  <TheNavbar></TheNavbar>
  <TheBanner></TheBanner>
  <TheCard></TheCard>
</template>

<script>
import TheNavbar from '@/components/Partians/TheNavbar.vue'
import TheBanner from "@/components/Partians/TheBanner.vue"
import TheCard from '@/components/Partians/TheCard.vue';

// @ is an alias to /src

export default {
  name: 'HomeView',
  components: {
    TheNavbar,
    TheBanner,
    TheCard
  }
}
</script>
