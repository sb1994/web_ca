<template>
  <div id="create-event">
      <h1>Create Event</h1>
      <p class="danger">{{errorMsg}}</p>
      <div class="form-group">
        <label for="name">Name Of the event:</label>
        <input type="text" class="form-control" v-model="event.name">
      </div>
      <div class="form-group">
        <label for="name">Event Description:</label>
        <input type="text" class="form-control" v-model="event.description">
      </div>
      <div class="form-group">
        <label for="img">Event Image:</label>
        <input type="file" class="form-control" @change="onFileChanged">
      </div>
      <div class="form-group">
        <button class="btn btn-primary" @click="addEvent">Add Event</button>
      </div>
      <pre>{{event}}</pre>
  </div>
</template>

<script>
import {apiDomain} from '../../config'
export default {
  data(){
    return {
      event: {
        name:"",
        description:"",
        img:"",
      },
      errorMsg:""
    }
  },
  methods: {
    addEvent(){
      //console.log('Adding Event');
      axios.post(apiDomain+"api/addEvent",this.event)
           .then(response=>{
             console.log(response.data);
             if(response.data.status == 200){
               alert(response.data.msg);
               this.$router.push({name:"index"});
             }else{
               this.errorMsg = response.data.msg;
             }
             //this.event.img = "";
             //this.$router.push({name:"projects_view"});
           }).catch(function (error) {
            if (error.response) {
              // The request was made and the server responded with a status code
              // that falls out of the range of 2xx
              console.log(error.response.data);
              console.log(error.response.status);
              console.log(error.response.headers);
            } else if (error.request) {
              // The request was made but no response was received
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
    }
  }

}
</script>

<style>

</style>
