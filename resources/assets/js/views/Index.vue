<template>
  <div id="index">
      <h1>Index Page</h1>
      <div class="row">
        <event-thumbnail v-for="event in events" :event="event" :key="event.id" @requestDelete="deleteEvent"></event-thumbnail>
      </div>
      {{events}}
  </div>
</template>

<script>
import {apiDomain} from '../config';
import _ from "lodash";
import EventThumbnail from './event/EventThumbnail.vue';
export default {
  components: {
    'event-thumbnail' : EventThumbnail
  },
  data() {
    return {
      events:[]
    }
  },
  created() {
    axios.get(apiDomain+"api/getEvents")
          .then(response=>{
              this.events = response.data;
              //console.log(response.data);
              console.log(this.events);
            }
          )
          .catch(function (error) {
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
  methods:{
    deleteEvent: function(event){
       this.events = _.without(this.events,event);
    }
  }

}
</script>

<style>

</style>
