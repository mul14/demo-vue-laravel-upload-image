<template>
  <div>
    <form method="POST" @submit.prevent="upload">
      <div>
        <input type="file" ref="image">
      </div>
      <button>Upload</button>
    </form>

    <div style="width: 600px;" v-if="image">
      <a :href="image">
        <img :src="image" style="max-width: 100%; height: auto;">
      </a>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      image: null
    };
  },

  methods: {
    async upload() {
      const files = this.$refs.image.files;
      if (!files.length) return;

      const formData = new FormData();

      formData.append("image", files[0]);

      const response = await axios.post("/api/upload-form", formData, {
        headers: {
          "Content-Type": "multipart/form-data"
        }
      });

      this.image = response.data.url;
    }
  }
};
</script>
