<template>
  <div id="edit-event">
      <h1>Edit event Page</h1>
      <div class="container">
        <div class="form-group">
          <label for="img" class="label-control">Event Image:</label>
          <input type="file" id="img" name="img" value="" class="form-control" @change="onFileChanged">
          <label for="disable-img">
            Keep Currnent image
          </label>
          <input type="checkbox" name="disable-img" id="disable-img" v-model="disableImg">
        </div>
        <div class="form-group">
          <label for="name" class="label-control">Event Name:</label>
          <input type="text" id="name" name="name" value="" class="form-control" v-model="event.name">
        </div>
        <div class="form-group">
          <label for="skill" class="label-control">Event description:</label>
          <input type="text" name="description" id="description" value="" class="form-control" v-model="event.description">
        </div>
        <div class="form-group">
           <button type="button" name="button" v-on:click="editEvent">Edit Event</button>
        </div>
      </div>
      {{event}}
      {{disableImg}}
  </div>
</template>

<script>
import {apiDomain} from '../../config';
export default {
  data(){
    return{
      event:{
        id:this.$route.params.id,
        name:"",
        description:"",
        img:"",
      },
      disableImg:"",
      error:{},
    }
  },
  created(){
    axios.get(apiDomain+'api/getEvent/'+this.$route.params.id)
         .then(response=>{
           this.event= response.data[0];
          //console.log(this.stored_data);
         }
       )
  },
  methods:{
    editEvent(){
      if (this.disableImg) {
        //console.log('Image Wont be updated');
        this.event.img = "";
      }
      axios.post(apiDomain+"api/editEvent",this.event)
           .then(response=>{
             console.log(response.data);
             this.$router.push({name:"index"});
           }).catch(function (error) {
            if (error.response) {
              // The request was made and the server responded with a status code
              // that falls out of the range of 2xx
              console.log(error.response.data);
              console.log(error.response.status);
              console.log(error.response.headers);
            } else if (error.request) {
              // The request was made but no response was received
              // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
              // http.ClientRequest in node.js
              console.log(error.request);
            } else {
              // Something happened in setting up the request that triggered an Error
              console.log('Error', error.message);
            }
            console.log(error.config);
          });
    },
    onFileChanged(event){
      //const files = event.target.files;
      const fileReader = new FileReader();
      fileReader.readAsDataURL(event.target.files[0]);
      fileReader.onload = (event)=>{
        this.event.img = event.target.result
      }
    },
  }
}
</script>
  
<style>

</style>
