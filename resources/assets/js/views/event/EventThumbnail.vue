<template>
  <div class="event-thumbnail col-md-4">
        <p>{{event.name}}</p>
        <img :src='path + "/storage/img/" + event.img' alt="" class="responsive-img">
        <div class="row">
            <div class="col-md-12">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-success">Show Event</button>
                    <button type="button" class="btn btn-danger">Delete event</button>
                    <button type="button" class="btn btn-warning">Edit Event</button>
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
    }
}
</script>
