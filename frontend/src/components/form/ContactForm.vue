<template>
     <v-container fluid class="d-flex ">
        <v-seet class="d-flex flex-column flex-1 w-100 justify-center bg-green aling-center" elevation="4">
            <h2 class="text-center mb-8">OUR INFORMATION</h2>
            <div class="our-phone d-flex flex-column mb-9 ml-16" >
                <div class="phone d-flex">
                    <v-icon size="24" color="withe">mdi mdi-phone</v-icon>
                    <h3 class="ml-3">PHONE CALL</h3>
                </div>
                <p>+855 97 63 88651/16971291</p>

            </div>
            <div class="our-phone d-flex flex-column mb-9 ml-16 mr-10" >
                <div class="location d-flex">
                    <v-icon size="24" color="withe">mdi mdi-map</v-icon>
                    <h3 class="ml-3">LOCATION</h3>
                </div>
                <p>BP511 St. 371 Phum Tropeang Chhuk (Borey Sorla), Sangkat Tek Thla, Khan Sen Sok, Phnom Penh, CAMBODIA</p>
            </div>
            <div class="our-phone d-flex flex-column mb-16 ml-16" >
                <h3 class="">OUR TOP SERVICES</h3>
                <ul>
                    <li> Rental house </li>
                    <li> Rental room </li>
                </ul>
            </div>
            

        </v-seet>
        <v-sheet class="m-10 w-100 bg-white pa-8" elevation="4">
            <h2 class="text-center mb-9">CONTAC US</h2>
            <v-form fast-fail x="d-flex " v-model="isValide">
                <div class=" d-flex">
                    <v-text-field type="text" clearable color="green-accent-4" label="Username" name="username" placeholder="username"
                        variant="outlined" class="mr-3" ></v-text-field>
                    <v-text-field type="text" clearable color="green-accent-4" label="Phone" name="phoneNumber" placeholder="Phone Number"
                        variant="outlined" ></v-text-field>
                </div>
                <v-text-field type="Email" clearable color="green-accent-4" label="Email" name="email" placeholder="Your Email Address"
                        variant="outlined" ></v-text-field>
                <div class="d-flex">
                    <v-textarea clearable label="Your Message" placeholder="Message" color="green-accent-4"
                        variant="outlined"></v-textarea>
                </div>
                <div class="d-flex justify-end">
                    <v-btn type="button" class=" mb-5 bg-green-accent-4 text-white px-15" >Submit</v-btn>
                </div>
            </v-form>
        </v-sheet>
    </v-container>
  
</template>

<script>
export default {

}
</script>

<style>

</style>