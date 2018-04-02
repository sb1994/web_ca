<template>
  <div class="event-thumbnail col-md-4">
        <p>{{event.name}}</p>
        <img :src='path + "/storage/img/" + event.img' alt="" class="responsive-img">
        <div class="row">
            <div class="col-md-12">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <!-- <button type="button" class="btn btn-success">Show Event</button> -->
                    <!-- <router-link tag="button" class="btn"></router-link> -->
                    
                    <!-- <button type="button" class="btn btn-warning">Edit Event</button> -->
                    <router-link tag="button" class="btn btn-success" v-bind:to="{name:'show_event',params:{id:event.id}}">Show Event</router-link>
                    <button type="button" class="btn btn-danger" @click="requestDelete(event)">Delete event</button>
                    <router-link tag="button" class="btn btn-warning" v-bind:to="{name:'edit_event',params:{id:event.id}}">Edit Event</router-link>
                </div>
            </div>
        </div>
  </div>
</template>
<script>
import {apiDomain} from '../../config';
export default {
    props:['event'],
    data(){
        return {
            events:[],
            path:""
        }
    },
    created(){
        this.path = apiDomain
    },
    methods: {
        requestDelete(event){
            //console.log(event.id);
            if (confirm('Are you sure you want to delete this event?'))
            {
                console.log(event.id);
            }
        }
    }
}
</script>
