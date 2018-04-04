<template>
  <section>
      <div class="comment-text">{{event_comment.comment}}</div>
        <div class="comment-footer">
            <div class="comment-info">
                <span class="comment-author">
                        <em>{{event_comment.username}}</em>
                    </span>
                <span class="comment-date">{{ event_comment.created_at}}</span>
            </div>
        </div>
  </section>
</template>

<script>
export default {
    props:['event_comment'],
    data(){
        return{

        }
    }
}
</script>

<style>

</style>
