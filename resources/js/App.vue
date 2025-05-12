<script setup>
  import { ref, provide } from 'vue';
  import TheHeader from '@/components/TheHeader.vue';
  import PageExample from '@/pages/PageExample.vue';
  
  // Use Vue's provide/inject pattern for better component communication
  const resetFunctions = {
    resetTerminal: null
  };
  
  // Provide the reset functions object to all child components
  provide('resetFunctions', resetFunctions);
</script>

<template>
  <div class="app-container">
    <TheHeader class="borderless-header" />
    <main class="borderless-main">
      <PageExample />
    </main>
  </div>
</template>

<style>
/* Global styles to remove borders */
* {
  box-sizing: border-box;
}

body, html {
  margin: 0;
  padding: 0;
  overflow-x: hidden;
  background-color: #000;
}

.app-container {
  display: flex;
  flex-direction: column;
  height: 100vh;
  width: 100vw;
  background-color: #000;
  color: #00FF00;
  overflow: hidden;
}

.borderless-header {
  /* Override any borders from TheHeader component */
  border: none !important;
  box-shadow: none !important;
}

.borderless-main {
  flex: 1;
  padding: 0;
  overflow-y: auto;
}

/* Target any Quasar cards or other components that might have borders */
:deep(.q-card) {
  border: none !important;
  box-shadow: none !important;
}

:deep(.matrix-card) {
  border: none !important;
  box-shadow: none !important;
  background-color: transparent !important;
}

:deep(.win98-header) {
  border: none !important;
  box-shadow: none !important;
}

:deep(.title-bar) {
  border: none !important;
}

:deep(.menu-bar) {
  border: none !important;
}
</style>