<template>
    <div :class="typeClass" v-show="show" v-html="body">
        {{ body }}
    </div>
</template>

<script>
export default {
  props: ["message", "type"],

  data() {
    return {
      body: "",
      typeClass: "",
      show: false
    };
  },

  created() {
    var context = this;
    if (this.message && this.type) {
      this.flash(this.message, this.type);
    }

    window.events.$on("flash", function(message, type) {
      context.flash(message, type);
    });
  },

  methods: {
    flash(message, type) {
        
        if (! type) {
            type = "info";
        }

        this.body = message;
        this.typeClass = "alert alert-" + type;
        this.show = true;

        if (type == 'success') this.hide();
    },

    hide() {
      setTimeout(() => {
        this.show = false;
      }, 50000);
    }
  }
};
</script>
