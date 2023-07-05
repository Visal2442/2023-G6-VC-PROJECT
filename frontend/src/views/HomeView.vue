<template>
  <TheNavbar></TheNavbar>
  <TheBanner></TheBanner>
  <TheCard></TheCard>
  <TheFooter></TheFooter>
</template>

<script>
import TheNavbar from '@/components/Partians/TheNavbar.vue';
import TheBanner from "@/components/Partians/TheBanner.vue";
import TheCard from '@/components/Partians/TheCard.vue';
import TheFooter from '@/components/Partians/TheFooter.vue';

// @ is an alias to /src

export default {
  name: 'HomeView',
  components: {
    TheNavbar,
    TheBanner,
    TheCard,
    TheFooter
    
  }
}
</script>
