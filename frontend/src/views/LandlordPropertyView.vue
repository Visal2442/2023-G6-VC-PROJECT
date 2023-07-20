<template>
  <div>
    <dashboard-header></dashboard-header>
    <v-container fluid class="my-5">
      <h1 class="my-5">Your Properties</h1>
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
              <tr class="" v-for="property of properties" :key="property.id">
                <td>{{ property?.name }}</td>
                <td>${{ property.price }}/Month</td>
                <td>{{ property.size }}</td>
                <td>{{ property.floor }}</td>
                <td>{{ property.number_of_room }}</td>
                <td>{{ property.number_of_bathroom }}</td>
                <td>{{ property.number_of_kitchen }}</td>
                <td>
                  <p v-if="property.available == 1">Available</p>
                  <p v-else>Unavailable</p>
                </td>
                <td>
                  <div class="d-flex align-center">
                    <v-icon
                      class="mdi mdi-pencil mr-1"
                      size="small"
                      @click="editProperty(property.id)"
                    ></v-icon>
                    <v-icon
                      class="mdi mdi-delete"
                      size="small"
                      color="red"
                      @click="deleteDialogProperty(property.id)"
                    ></v-icon>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </v-row>
      </v-container>
    </v-container>

    <v-dialog v-model="dialog" width="40%">
      <v-card>
        <v-sheet class="m-10 w-100 bg-white pa-8" elevation="4">
          <v-card-title
            align="center"
            class="text-green text-h4 mb-5 font-weight-bold"
            >EDITE PROPERTY</v-card-title
          >
          <v-form fast-fail x="d-flex flex-column">
            <div class="d-flex">
              <v-text-field
                type="text"
                clearable
                color="green-accent-4"
                label="House Name"
                class="mr-5"
                placeholder="House Name"
                variant="outlined"
                v-model="houseName"
              ></v-text-field>
              <v-text-field
                type="text"
                clearable
                color="green-accent-4"
                label="Size"
                name="size"
                placeholder="Size"
                variant="outlined"
                v-model="size"
              ></v-text-field>
            </div>
            <div class="d-flex">
              <v-text-field
                type="number"
                clearable
                color="green-accent-4"
                label="Price Per Month"
                class="mr-5"
                placeholder="Price Per Month"
                variant="outlined"
                v-model="pricePerMonth"
              ></v-text-field>
              <v-file-input
                label="Choose an image"
                id="image-file-input"
                name="image"
                variant="outlined"
                clearable
                color="green-accent-4"
                accept="image/*"
                placeholder="Image"
              ></v-file-input>
            </div>
            <div class="d-flex">
              <v-text-field
                type="number"
                clearable
                color="green-accent-4"
                label="Floor"
                class="mr-5"
                name="floor"
                placeholder="Floor"
                variant="outlined"
                v-model="floor"
              ></v-text-field>
              <v-text-field
                type="number"
                clearable
                color="green-accent-4"
                label="Number Of Room"
                class="mr-5"
                name="room"
                placeholder="Number Of Room"
                variant="outlined"
                v-model="numberOfRooms"
              ></v-text-field>
              <v-text-field
                type="number"
                clearable
                color="green-accent-4"
                label="Number Of Kitchen"
                class="mr-5"
                name="kitchen"
                placeholder="Number Of Kitchen"
                variant="outlined"
                v-model="numberOfKitchens"
              ></v-text-field>
              <v-text-field
                type="number"
                clearable
                color="green-accent-4"
                label="Number Of Bathroom"
                name="bathroom"
                placeholder="Number Of Bathroom"
                variant="outlined"
                v-model="numberOfBathrooms"
              ></v-text-field>
            </div>
            <div class="d-flex">
              <v-select
                v-model="selected"
                placeholder="Number Of Kitchen"
                label="Select District"
                :items="districts"
                density="compact"
                color="green-accent-4"
                variant="outlined"
              ></v-select>
            </div>
            <div class="d-flex">
              <v-textarea
                clearable
                label="Description"
                placeholder="Discription"
                color="green-accent-4"
                variant="outlined"
                v-model="description"
              ></v-textarea>
            </div>
            <v-card-actions class="button">
              <v-btn
                class="cancel bg-blue-accent-3 text-white"
                color="black"
                text
                @click="closeDialog()"
                >Cancel</v-btn
              >
              <v-btn
                class="save bg-green-accent-3 text-white"
                color="black"
                text
                @click="saveChanges()"
                >Save</v-btn
              >
            </v-card-actions>
          </v-form>
        </v-sheet>
      </v-card>
    </v-dialog>

    <v-dialog v-model="deleteDialog" width="25%" height="60%">
      <v-card>
        <v-sheet class="m-5 w-100 bg-white pa-5" elevation="4">
          <div class="cencelIcon">
            <v-icon class="mdi mdi-alert text-red"></v-icon>
          </div>
          <v-form fast-fail x="d-flex flex-column">
            <p align="center" class="mb-5 mt-5">
              Do you want to delete this property?
            </p>
            <v-card-actions class="button">
              <v-btn class="cancel text-button text-blue" @click="cencel()"
                >Cancel</v-btn
              >
              <v-btn
                class="deleteBtn bg-red text-overline text-white"
                color="black"
                @click="deleteProperty()"
              >
                Delete
              </v-btn>
            </v-card-actions>
          </v-form>
        </v-sheet>
      </v-card>
    </v-dialog>
  </div>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";
const user_id = ref(localStorage.getItem("user_id"));
const properties = ref([]);
const dialog = ref(false);
const deleteDialog = ref(false);
const houseName = ref("");
const size = ref("");
const pricePerMonth = ref(0);
const image = ref(null);
const floor = ref(0);
const numberOfRooms = ref(0);
const numberOfKitchens = ref(0);
const numberOfBathrooms = ref(0);
const selected = ref("");
const description = ref("");

axios.get(`/getAllProperties/${user_id.value}`).then((res) => {
  properties.value = res.data.data;
  console.log(user_id.value);
  return properties.value;
});

// const propertyDataId =ref([]);
const editProperty = (property_id) => {
  // editeProperty = property_id;
  localStorage.setItem("property_id", property_id);
  axios.get(`/detail/${property_id}`).then((response) => {
    console.log(response.data.data);
    // console.log(response.data.data[0]["district"]["title"]);
    houseName.value = response.data.data[0]["name"];
    size.value = response.data.data[0]["size"];
    pricePerMonth.value = response.data.data[0]["price"];
    image.value = response.data.data[0]["image"];
    console.log(image.value);
    floor.value = response.data.data[0]["number_of_floor"];
    numberOfBathrooms.value = response.data.data[0]["number_of_bathroom"];
    numberOfKitchens.value = response.data.data[0]["number_of_kitchen"];
    numberOfRooms.value = response.data.data[0]["number_of_room"];
    description.value = response.data.data[0]["description"];
    selected.value = response.data.data[0]["district"]["value"];

    // set the image data property to the URL of the image

    // pass the URL of the image to the v-file-input component
    // const fileInput = document.querySelector('#image-file-input');
    // fileInput.value = image.value;
  });
  localStorage.setItem("property_id", property_id);

  dialog.value = true;
};

const districts = ref([]);
onMounted(() => {
  axios.get("/districts").then((res) => {
    districts.value = res.data.data;
  });
});

const saveChanges = () => {
  let id = localStorage.getItem("property_id");
  const data = {
    name: houseName.value,
    size: size.value,
    price: pricePerMonth.value,
    image: image.value,
    number_of_floor: floor.value,
    number_of_room: numberOfRooms.value,
    number_of_kitchen: numberOfKitchens.value,
    number_of_bathroom: numberOfBathrooms.value,
    description: description.value,
    district_id: selected.value,
    user_id: 1,
  };
  console.log(data);
  axios
    .put(`/updateProperty/${id}`, data)
    .then((res) => {
      // reload the properties list
      // axios.get("/getAllProperties/1").then((res) => {
      //   property.value = res.data.data;
      // });
      // close the dialog
      console.log(res.data.data);
      dialog.value = false;
    })
    .catch((errors) => {
      // handle validation errors
      console.log(errors);
    });
};

const deleteDialogProperty = (property_id) => {
  localStorage.setItem('property_id',property_id)
  deleteDialog.value = true;
};

const cencel = () => {
  deleteDialog.value = false;
};

const deleteProperty = () => {
  let propertiesId = localStorage.getItem("property_id")

  axios
  .delete(`/properties/delete/${propertiesId}`)
  .then((res) => {
    properties.value = res.data.data;
  })
  .catch((errors) => {
    console.log(errors);
  });
  console.log(localStorage.getItem('property_id'));

  deleteDialog.value = false
};
</script>

<style>
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

.button {
  display: flex;
  flex-direction: row;
  justify-content: end;
  margin-top: -1%;
}

.cancel {
  margin-right: 20px;
}

.cancel:hover {
  background: rgb(239, 239, 239);
}

.save:hover {
  background: gray;
}

.cencelIcon {
  display: flex;
  justify-content: center;
  font-size: 30px;
}

.deleteDialog {
  height: 50%;
}
</style>
