<template>
    <div class="bg-grey-darken-3 text-center d-flex flex-column">
        <div class="main-footer">
            <div class="footer">
                <div class="item pt-0 mx-4">
                    <h3>Contact Us</h3>
                    <div class="contact-item">
                        <span>Email: </span>
                        <p>rentalhouse.kh@gmail.com</p>
                    </div>
                    <div class="contact-item">
                        <span>Phone number: </span>
                        <p> +855 883651987</p>
                    </div>
                    <span>Be come a landlord: </span><v-btn class="bg-green" :to="{name:'Contact'}">Request Now</v-btn>
                </div>
                <div class="item pt-0 mx-4">
                    <h3>About Us</h3> 
                    <p>Welcome to Rental House, your go-to source for finding the perfect rental property for your needs.
                     Our website was founded with the mission of making the rental process as easy and stress-free as possible for renters and property owners alike.</p>
                </div>
                <div class="item pt-0 mx-4">
                    <h3>Location</h3>
                    <p>BP 511, Phum Tropeang Chhuk (Borey Sorla) Sangtak, Street 371, Phnom Penh</p>
                </div>
            </div>
            <div class="title-house">
                <h1 class="dream house">Dream House</h1>
                <div class="dream date">
                    {{ new Date().getFullYear() }} — <p> Dream House</p>
                </div>
                <div class="dream dream-icon">
                    <v-icon class="mdi mdi-facebook " color="grey darken-3 mr-4"></v-icon>
                    <v-icon class="mdi mdi-instagram " color="grey darken-3 mr-4"></v-icon>
                    <v-icon class="mdi mdi-google " color="grey darken-3 mr-4"></v-icon>
                    <v-icon class="mdi mdi-email " color="grey darken-3 mr-4"></v-icon>
                    <v-icon class="mdi mdi-snapchat " color="grey darken-3 mr-4"></v-icon>
                </div>
            </div>
            
        </div>
    </div>
</template>

<script setup>

</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

.main-footer{
    margin: 20px;
}
.footer {
    display: flex;

}
.item {
    margin: 20px;
    text-align: start;
    flex: 1;
}
.dream {
    flex:1 ;
    text-align: center;
    margin-top: 30px;

}
.footer-center {
    display: flex;
    justify-content: center;
    align-items: center;
}
.icon {
    margin: 10px;
    color: white;
}
h1,h3{
    font-family: 'Roboto', sans-serif;
}
v-btn{
    color: black;
    background-color: rgb(47, 240, 150);
}
.title-house{
    display: flex;
    width: 100%;
    justify-content: space-between;
    border-top: 1px solid rgb(90, 89, 89);
}
p{
    font-size: 15px;
    color: rgb(184, 176, 176);
    display: flex;
}
span{
    display: flex;
}
.date{
    display: flex;
    justify-content: center;
    margin-top: 40px;

}
.house{
    justify-content: flex-start;
    margin-left: -9%;
}
.dream-icon{
    align-items: end;
    justify-content: end;
    text-align: end;
}
.contact-item{
    display: flex;
}

.contact-item span{
    margin-right: 10px;
}
</style>