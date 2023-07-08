<template>
  <div>
  <v-container class="pa-4 text-center">
    
    <v-row class="fill-height" align="center" justify="center">
      <template v-for="(item, i) of items" :key="i">
        <v-col cols="12" md="4">
         
              <v-hover v-slot="{ isHovering, props }">
            <v-card :elevation="isHovering ? 1 : 12" :class="{ 'on-hover': !isHovering }" v-bind="props">
              <v-img :src="item.img" height="305px" cover>
                <v-card-title class="text-h6 text-white d-flex flex-column">
                  <p v-if="isHovering" class="mt-4">
                    {{ item.title }}
                  </p>
                  <div>
                    <p v-if="isHovering"  class="ma-0 text-body-1 font-weight-bold">
                      {{ item.text }}
                    </p>
                    <p v-if="isHovering" class="text-caption font-weight-medium">
                      {{ item.subtext }}
                    </p>
                  </div>
                </v-card-title>
                <div class="button">
                  <v-btn  v-if="isHovering" variant="text" class="btn-detail mt-16 bg-blue">
                    detail
                  </v-btn>
                  <v-btn v-if="isHovering" variant="text" color="white" class="btn-booking mt-16 ml-5 bg-orange">
                    book now
                  </v-btn>

                </div>
              </v-img>
              <div class="d-flex justify-space-between p-5 bg-green">
                <div class="price pa-2  d-flex flex-column justify-end ml-3">
                  <p class="ma-0 text-body-1 font-weight-bold">
                    Price:
                    {{ item.Price }}
                  </p>
                  <div class="star d-flex">
                    <div v-for="i in 5" :key="i" class="star">
                      <v-icon size="" color="" icon="mdi mdi-star"></v-icon>
                    </div>
                  </div>

                </div>
                <div class="icon d-flex  justify-center align-center">
                  <v-icon size="large"  class="mr-5 boder" icon="mdi mdi-comment"></v-icon>
                  <v-icon size="large"  class="mr-4 boder"  icon="mdi mdi-bookmark  "></v-icon>
                </div>
              </div>
            </v-card>
          </v-hover>
        </v-col>
      </template>
    </v-row>
  </v-container>
</div>
</template>

<script>
export default {
  data: () => ({
    icons: ['mdi mdi-rewind', 'mdi mdi-play', 'mdi mdi-fast-forward'],
    items: [
      {
        title: 'New Releases',
        Price: '300$',
        subtext: 'Newly released songs. Updated daily.',
        img: 'https://images.sanantoniomag.com/wp-content/uploads/2022/02/Sanctuary-1-1246x700.jpg',
      },
      {
        title: 'Rock',
        text: 'Greatest Rock Hits',
        Price: '400$',
        img: 'https://images.sanantoniomag.com/wp-content/uploads/2022/02/Sanctuary-1-1246x700.jpg',
      },
      {
        title: 'Mellow Moods',
        Price: '500$',
        subtext: 'Chill beats to mellow you out.',
        img: 'https://images.sanantoniomag.com/wp-content/uploads/2022/02/Sanctuary-1-1246x700.jpg',
      },
    ],
    transparent: 'rgba(255, 255, 255, 0)',
  }),
}
</script>

<style scoped>
.v-card {
  transition: opacity .4s ease-in-out;
  margin-top: 15%;
  background-color: transparent;
}

.v-card:not(.on-hover) {
  opacity: 0.6;
}


.detail,
.booking {
  color: rgb(41, 24, 24) !important;
}


.button{
  display: flex;
  flex-direction: row;
  justify-content: flex-end;
  margin-top: 25%;
  margin-right: 20px;
}
</style>