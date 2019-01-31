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
    convertToBase64(file) {
      return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => resolve(reader.result);
        reader.onerror = error => reject(error);
      });
    },

    async upload() {
      const files = this.$refs.image.files;
      if (!files.length) return;

      const base64 = await this.convertToBase64(files[0]);

      const response = await axios.post("/api/upload", {
        image: base64
      });

      this.image = response.data.url;
    }
  }
};
</script>
