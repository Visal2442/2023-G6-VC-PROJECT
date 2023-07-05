<template>
    <div class="bg-grey-darken-3 text-center mt-5 d-flex flex-column">
        <div class="footer">
            <div class="item pt-0 mx-4">
                <h3>Contact Us</h3>
                <span>Email: </span>rentalhouse@gmail.com
                <span>Phone number: </span>+855 883651987
            </div>
            <div class="item pt-0 mx-4">
                <h3>About Us</h3>
                citudin. Vestibulum eu ipsum vel diam elementum tempor vel ut orci. Orci varius natoque penatibus et magnis
                dis parturient montes, nascetur ridiculus mus.
            </div>
            <div class="item pt-0 mx-4">
                <h3>Product</h3>
                <span>Location: </span>
                <p>BP 511, Phum Tropeang Chhuk (Borey Sorla) Sangtak, Street 371, Phnom Penh</p>
            </div>

        </div>
        <div class="footer-center">
            <div class="icon">
                <v-btn class="mx-3" icon="mdi mdi-facebook"></v-btn>
                <v-btn class="mx-3" icon="mdi mdi-linkedin"></v-btn>
                <v-btn class="mx-3" icon="mdi mdi-youtube"></v-btn>
                <v-btn class="mx-3" icon="mdi mdi-instagram"></v-btn>
            </div>
        </div>

        <div>
            {{ new Date().getFullYear() }} — <strong>Rentalhouse</strong>
        </div>
    </div>
</template>

<script setup>

</script>

<style scoped>
.footer {
    display: flex;

}

.item {
    margin: 30px;
    text-align: start;

}

img {
    width: 100px;
}

.footer-center {
    display: flex;
    justify-content: center;
    border-top: 1px solid rgb(240, 239, 239);
    border-bottom: 1px solid rgb(255, 250, 250);
    align-items: center;
    margin-bottom: 10px;
}

.icon {
    margin: 10px;
    color: white;
}

h3 {
    margin-bottom: 10px;
}

icon {
    color: "white";
}
</style>