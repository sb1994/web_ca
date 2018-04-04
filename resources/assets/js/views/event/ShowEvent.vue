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
			</div>
		</div>
		<!-- <pre>{{event}}</pre> -->
	</div>
</template>

<script>
import {apiDomain} from '../../config';
import EventCommentComposer from './event_comments/EventCommentComposer.vue';
export default {
	components:{
		'event-comment-composer':EventCommentComposer
	},
	data(){
		return {
			event :{
				id:"",
				name:"",
				description:"",
				img:""
			},
			path:apiDomain
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
		updateCommentLog(){
        axios.get(apiDomain+"api/getEventCommentsByPid/"+this.$route.params.id)
             .then(response=>{
               //console.log(response.data[0]);
               this.event_comments=response.data.event_comments;
               //this.$router.push({name:"projects_view"});
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
                // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
                // http.ClientRequest in node.js
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
