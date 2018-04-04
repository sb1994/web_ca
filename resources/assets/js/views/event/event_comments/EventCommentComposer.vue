<template>
	<div class="event-comment-composer">
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" class="form-control" name="username" v-model="comment.username" id="username" placeholder="Please ente a username">
		</div>
		<div class="form-group">
			<textarea class="form-control" placeholder="Add comment..." required v-model="comment.comment" ></textarea>
			<span class="input" v-if="errorComment" style="color:red">{{errorComment}}</span>
		</div>
		<input type="button" class="btn" v-on:click="addComment" value="Add Comment">
		<pre>{{comment}}</pre>
		<!-- <pre>{{eventId}}</pre> -->
	</div>

</template>

<script>
import {apiDomain} from '../../../config';
export default {
	data(){
		return {
			//props:['eventId'],
			comment: {
				event_id:this.$route.params.id,
				comment:"",
				username:"",
			},
			errorComment:"",
		}
	},
	methods:{
		addComment(){
			//this.comment.e_id = this.eventId;
			if (this.comment.comment == ""||this.comment.comment_username=="") {
				this.errorComment = "Please enter all fields";
			}else{
				this.errorComment = "";
				axios.post(apiDomain+"api/addEventComment",this.comment)
					.then(response=>{
					console.log(response.data);
					this.comment.comment = "";
					this.$emit('commentAdded');
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
			//console.log(this.comment.p_id);
		}
	}
}
</script>

<style scoped>

</style>
