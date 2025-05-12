<!-- filepath: c:\Users\Nikola\Desktop\kole\WebMobUi\vue\projet\resources\js\components\MatrixTerminal.vue -->
<script setup>
import { defineProps } from 'vue';
import '@/styles/matrix-theme.css'; // Import shared styles

defineProps({
  error: Object,
  loading: Boolean
});
</script>

<template>
  <div class="matrix-theme">
    <div v-if="error" class="matrix-error q-pa-md text-center">
      <div class="terminal-glow">SYSTEM ERROR</div>
      <pre class="terminal-text">{{ error }}</pre>
    </div>
    
    <div v-else-if="loading" class="matrix-loading q-pa-md text-center">
      <div class="terminal-text">LOADING DATA...</div>
      <q-spinner-dots color="green" size="40px" />
    </div>
    
    <div v-else>
      <slot></slot>
    </div>
  </div>
</template>

<style scoped>
/* Component-specific styles only */
.matrix-theme {
  width: 80%;
  margin: 0 auto;
  max-width: 1200px;
}

/* Make sure nested content respects the container width */
.matrix-theme > div {
  width: 100%;
}
</style>