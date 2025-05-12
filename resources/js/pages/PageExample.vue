<script setup>
import { ref, inject, onMounted } from 'vue';
import MatrixTerminal from '@/components/MatrixTerminal.vue';
import MatrixAdventure from '@/components/MatrixAdventure.vue';
import IntroWebsite from '@/components/IntroWebsite.vue';

// Get the shared reset functions object
const resetFunctions = inject('resetFunctions');

// Reference to access child component methods
const adventureRef = ref(null);

// Storage key
const STORAGE_KEY = 'matrix-adventure-chapter';

// Track whether the adventure has started
const showAdventure = ref(false);

// Handle the start adventure event from IntroWebsite
function handleStartAdventure() {
  showAdventure.value = true;
}

// Handle reset from header component
function resetTerminal() {
  if (adventureRef.value) {
    adventureRef.value.resetToChapter1();
  }
  // Reset to intro screen
  showAdventure.value = false;
}

// Register the reset function when component mounts
onMounted(() => {
  resetFunctions.resetTerminal = resetTerminal;
});
</script>

<template>
  <MatrixTerminal>
    <!-- Show the intro website first -->
    <IntroWebsite 
      v-if="!showAdventure"
      @start-adventure="handleStartAdventure"
    />
    
    <!-- Show the adventure after user clicks the start button -->
    <MatrixAdventure 
      v-else
      ref="adventureRef"
      :storage-key="STORAGE_KEY"
      :initial-chapter="1"
    />
  </MatrixTerminal>
</template>