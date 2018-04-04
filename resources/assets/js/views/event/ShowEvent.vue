<template>
	<div id="show-event">
		<div class="row">
			<div class="col-md-12">
				<H1>{{event.name}}</H1>
				
				<div class="row">
					<div class="col-md-6">
						<img v-bind:src='path + "/storage/img/" + event.img' class="img-thumbnail" alt="">
					</div>
					<div class="col-md-6">
						<p>Event description: {{event.description}}</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<event-comment-composer  @commentAdded="updateCommentLog"></event-comment-composer>
				<event-comment-log v-bind:event_comments="event_comments"></event-comment-log>
			</div>
		</div>
		<!-- <pre>{{event}}</pre> -->
	</div>
</template>

<script>
import {apiDomain} from '../../config';
import EventCommentComposer from './event_comments/EventCommentComposer.vue';
import EventCommentLog from './event_comments/EventCommentLog.vue';
export default {
	components:{
		'event-comment-composer':EventCommentComposer,
		'event-comment-log':EventCommentLog,

	},
	data(){
		return {
			event :{
				id:"",
				name:"",
				description:"",
				img:""
			},
			event_comments:[],
			path:apiDomain
		}
	},
	created(){
		axios.get(apiDomain+'api/getEvent/'+this.$route.params.id)
         .then(response=>{
		   this.event= response.data[0];
         }
	   )
	   axios.get(apiDomain+"api/getEventCommentsByEid/"+this.$route.params.id)
             .then(response=>{
				 console.log(response.data);
				 
               this.event_comments=response.data.event_comments;
               //console.log(this.event_comments);
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
	methods:{
		updateCommentLog(){
        axios.get(apiDomain+"api/getEventCommentsByEid/"+this.$route.params.id)
             .then(response=>{
				 console.log(response.data);
				 
               this.event_comments=response.data.event_comments;
               console.log(this.event_comments);
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
	}
	}
}
</script>

<style>
 
</style>
