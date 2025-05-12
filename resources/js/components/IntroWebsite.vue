<!-- filepath: c:\Users\Nikola\Desktop\kole\WebMobUi\vue\projet\resources\js\components\IntroWebsite.vue -->
<script setup>
import { ref, computed, onMounted } from 'vue';
import '@/styles/matrix-theme.css'; // Import shared styles

const emit = defineEmits(['startAdventure']);

// Reactive reference to track if saved game exists
const hasSavedGame = ref(false);

// Check for saved game on component mount
onMounted(() => {
  const savedChapter = window.localStorage.getItem('matrix-adventure-chapter');
  if (savedChapter && parseInt(savedChapter) > 1) {
    hasSavedGame.value = true;
  }
});

const startAdventure = () => {
  emit('startAdventure');
};

const startNewGame = () => {
  // Clear saved data and start fresh
  window.localStorage.removeItem('matrix-adventure-chapter');
  emit('startAdventure');
};
</script>

<template>
  <div class="intro-page">
    <div class="intro-header">
      <h1 class="matrix-title">THE DOMOVOI ADVENTURE</h1>
      <div class="matrix-subtitle">Un voyage textuel dans l'enfer numérique</div>
    </div>
    
    <div class="intro-content">
      <div class="intro-text">
        <p>Qui est Domovoi ?</p>
        <p>Pourquoi cette entreprise</p>
        <p>Est-ce que le lapin blanc existe ?</p>
        <p class="blink">_</p>
      </div>
      
      <div class="matrix-code-rain"></div>
      
      <div class="intro-description">
        <p>Naviguez dans une aventure textuelle mystérieuse inspirée de l'univers de Matrix. Faites des choix qui détermineront votre chemin et découvrez la vérité sur la réalité.</p>
        <p>Etes vous prêt à aller jusqu'au bout ?</p>
      </div>
    </div>
    
    <div class="intro-actions">
      <!-- Continue saved game if exists -->
      <q-btn
        v-if="hasSavedGame"
        color="green"
        outline
        class="matrix-btn q-mr-md"
        @click="startAdventure"
      >
        CONTINUE SAVED GAME
      </q-btn>
      
      <!-- Always show option to start new game -->
      <q-btn
        color="green"
        outline
        class="matrix-btn"
        @click="startNewGame"
      >
        START NEW GAME
      </q-btn>
    </div>
  </div>
</template>

<style scoped>
.intro-page {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-between;
  min-height: 70vh;
  width: 100%;
  padding: 2rem 0;
}

.intro-header {
  text-align: center;
  margin-bottom: 3rem;
}

.matrix-title {
  font-size: 3rem;
  color: #00FF00;
  font-family: 'Courier New', monospace;
  text-shadow: 0 0 10px #00FF00;
  letter-spacing: 3px;
  margin-bottom: 0.5rem;
}

.matrix-subtitle {
  font-size: 1.2rem;
  color: #00AA00;
  font-family: 'Courier New', monospace;
  letter-spacing: 1px;
}

.intro-content {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 100%;
  margin-bottom: 3rem;
}

.intro-text {
  font-size: 1.5rem;
  color: #00FF00;
  font-family: 'Courier New', monospace;
  text-align: center;
  margin-bottom: 2rem;
}

.intro-text p {
  margin: 0.5rem 0;
  animation: fadeIn 2s;
}

.intro-text p:nth-child(1) {
  animation-delay: 0.5s;
}

.intro-text p:nth-child(2) {
  animation-delay: 2s;
}

.intro-text p:nth-child(3) {
  animation-delay: 3.5s;
}

.blink {
  animation: cursor-blink 1s step-end infinite;
}

.matrix-code-rain {
  width: 100%;
  height: 100px;
  background: linear-gradient(180deg, rgba(0, 255, 0, 0.2) 0%, rgba(0, 0, 0, 0) 100%);
  margin: 2rem 0;
  position: relative;
  overflow: hidden;
}

.matrix-code-rain::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: repeating-linear-gradient(
    0deg,
    transparent,
    transparent 30px,
    rgba(0, 255, 0, 0.5) 30px,
    rgba(0, 255, 0, 0.5) 31px
  );
  animation: rain 1s linear infinite;
}

.intro-description {
  max-width: 800px;
  text-align: center;
  font-family: 'Courier New', monospace;
  color: #00FF00;
  line-height: 1.6;
  padding: 0 20px;
}

.intro-actions {
  margin-top: 3rem;
  text-align: center;
}

.matrix-btn {
  font-family: 'Courier New', monospace;
  letter-spacing: 2px;
  padding: 10px 20px;
  border: 2px solid #00FF00;
  background-color: rgba(0, 255, 0, 0.1);
  transition: all 0.3s;
}

.matrix-btn:hover {
  background-color: rgba(0, 255, 0, 0.2);
  box-shadow: 0 0 15px #00FF00;
}

@keyframes fadeIn {
  0% { opacity: 0; }
  100% { opacity: 1; }
}

@keyframes cursor-blink {
  0%, 100% { opacity: 0; }
  50% { opacity: 1; }
}

@keyframes rain {
  0% { background-position: 0 0; }
  100% { background-position: 0 100px; }
}
</style>