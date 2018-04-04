<template>
  <div class="event-comment-log">
      <div class="chat" v-for="event_comment in event_comments" v-bind:key="event_comment.id">
        <event-comment v-bind:event_comment="event_comment"></event-comment>
      </div>
  </div>
</template>

<script>
import EventComment from './EventComment.vue';

export default {
  components:{
    'event-comment':EventComment
  },
  props:['event_comments']
}
</script>

<style>

</style>
