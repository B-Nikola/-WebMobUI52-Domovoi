<!-- filepath: c:\Users\Nikola\Desktop\kole\WebMobUi\vue\projet\resources\js\components\MatrixAdventure.vue -->
<script setup>
import { ref, onMounted, watch, computed, nextTick, defineExpose } from 'vue';
import '@/styles/matrix-theme.css'; // Import shared styles

const props = defineProps({
  // Initial chapter to load
  initialChapter: {
    type: Number,
    default: 1
  },
  // Storage key for saving progress
  storageKey: {
    type: String,
    default: 'matrix-adventure-chapter'
  }
});

// Chapter state management
const chapter = ref(props.initialChapter);
const chapterInpu = ref(props.initialChapter);

// Game state
const chapterData = ref(null);
const chapterError = ref(null);
const chapterLoading = ref(true);

// Animation states
const textAnimationComplete = ref(false);
const imageVisible = ref(false);
const buttonsVisible = ref(false);

// Terminal input
const terminalCommand = ref('');
const commandInput = ref(null);
const commandError = ref(false);

// Fetch handling
import { useFetchJson } from '@/composables/useFetchJson';
const fetchResult = useFetchJson({
  url: `chapter`,
  method: 'GET',
  data: { chapterId: chapter.value },
  immediate: false
});

// Expose fetch result functions
const executeChapterFetch = fetchResult.execute;

// Setup watchers for reactive updates
watch(fetchResult.data, (newData) => {
  chapterData.value = newData;
});

watch(fetchResult.error, (newError) => {
  chapterError.value = newError;
});

watch(fetchResult.loading, (isLoading) => {
  chapterLoading.value = isLoading;
});

// Function to fetch chapter data manually
function loadChapter(chapterNumber) {
  executeChapterFetch({chapterId: chapterNumber});
}

// Load saved chapter data on component mount
onMounted(() => {
  // First check for saved chapter
  const savedChapter = localStorage.getItem(props.storageKey);
  if (savedChapter) {
    const chapterNum = parseInt(savedChapter, 10);
    if (!isNaN(chapterNum) && chapterNum > 0) {
      chapterInpu.value = chapterNum;
      chapter.value = chapterNum;
      console.log(`Loaded saved chapter: ${chapterNum}`);
    }
  }
  loadChapter(chapterInpu.value);
});

// Watch for chapter changes
watch(chapterInpu, (chapterNumber) => {
  chapter.value = chapterNumber;
  console.log(`chapter: ${chapter.value}`);
  
  // Save to localStorage
  localStorage.setItem(props.storageKey, chapterNumber.toString());
  
  // Fetch the new chapter data
  loadChapter(chapterNumber);
});

// Format chapter text into an array of characters for animation
const formattedChapterText = computed(() => {
  if (!chapterData.value || !chapterData.value.text) return '';
  return chapterData.value.text;
});

// Replace the existing lastLine computed property with this enhanced version
const lastLine = computed(() => {
  if (!chapterData.value || !chapterData.value.text) return '';
  
  // Find text between DOUBLE parentheses after two returns
  const text = chapterData.value.text;
  
  // Look for a pattern with two or more newlines followed by text in DOUBLE parentheses
  const matches = text.match(/\n\n+\s*\((.*?)\)\s*$/);
  
  if (matches && matches[1]) {
    // Return just the text between double parentheses (without the parentheses)
    return matches[1].trim();
  } else {
    // Fallback to the original last line logic
    const lines = text.split('\n');
    const lastLine = lines[lines.length - 1].trim();
    
    // Try to extract text between double parentheses if present
    const doubleParenthesesMatch = lastLine.match(/\(\((.*?)\)\)/);
    if (doubleParenthesesMatch) {
      return doubleParenthesesMatch[1].trim();
    }
    
    // Second fallback: try single parentheses
    const singleParenthesesMatch = lastLine.match(/\((.*?)\)/);
    return singleParenthesesMatch ? singleParenthesesMatch[1].trim() : lastLine;
  }
});

// Animation function
function animateText(selector, onComplete) {
  const elements = document.querySelectorAll(selector);
  if (!elements.length) {
    if (onComplete) onComplete();
    return;
  }
  
  let completedElements = 0;
  
  elements.forEach(element => {
    const text = element.textContent;
    element.textContent = '';
    element.classList.add('ready-to-animate');
    
    let charIndex = 0;
    const typeInterval = setInterval(() => {
      if (charIndex < text.length) {
        element.textContent += text[charIndex];
        charIndex++;
      } else {
        clearInterval(typeInterval);
        element.classList.remove('ready-to-animate');
        element.classList.add('animation-complete');
        
        completedElements++;
        if (completedElements === elements.length && onComplete) {
          onComplete();
        }
      }
    }, 30);
  });
}

// Process terminal commands
function executeCommand() {
  if (!chapterData.value || !chapterData.value.answers) return;
  
  const command = terminalCommand.value.trim().toLowerCase();
  const answers = chapterData.value.answers.map(a => a.toLowerCase());
  
  // Find matching answer index
  const matchIndex = answers.findIndex(answer => 
    answer.includes(command) || command.includes(answer)
  );
  
  if (matchIndex !== -1) {
    // Valid command - go to corresponding chapter
    chapterInpu.value = chapterData.value.chapters[matchIndex];
    terminalCommand.value = '';
    commandError.value = false;
  } else {
    // Invalid command - show error
    commandError.value = true;
    // Clear error after delay
    setTimeout(() => {
      commandError.value = false;
    }, 2000);
    
    // Shake input (visual feedback)
    const el = commandInput.value;
    if (el) {
      el.classList.add('shake-animation');
      setTimeout(() => {
        el.classList.remove('shake-animation');
      }, 500);
    }
  }
}

// Restart adventure
function restartAdventure() {
  chapterInpu.value = 1;
  localStorage.setItem(props.storageKey, "1");
  console.log('Adventure restarted, localStorage reset to chapter 1');
}

// Reset to chapter 1 (for external control)
function resetToChapter1() {
  chapterInpu.value = 1;
  localStorage.setItem(props.storageKey, "1");
  console.log('Chapter reset to 1, localStorage updated');
}

// Expose methods for parent components
defineExpose({
  resetToChapter1
});

// Focus input when buttons appear
watch(buttonsVisible, (visible) => {
  if (visible) {
    nextTick(() => {
      if (commandInput.value) {
        commandInput.value.focus();
      }
    });
  }
});

// Animation sequence
watch(chapterData, async () => {
  if (chapterData.value) {
    // Reset animation states
    textAnimationComplete.value = false;
    imageVisible.value = false;
    buttonsVisible.value = false;
    
    await nextTick();
    
    // First animate the main chapter text
    animateText('.animated-text', () => {
      // When text animation is complete, show the image
      textAnimationComplete.value = true;
      imageVisible.value = true;
      
      // After a delay, show and animate the buttons
      setTimeout(() => {
        buttonsVisible.value = true;
        nextTick(() => {
          animateText('.terminal-btn-text .animated-text');
        });
      }, 1000); // 1 second delay after text finishes
    });
  }
});
</script>

<template>
  <q-card dark class="matrix-card q-mt-md flex column justify-between" v-if="chapterData" style="min-height: 70vh">
    <div>
      <q-card-section class="terminal-header">
        <div class="text-h5 text-center terminal-glow">C:\CHAPTER_{{ chapter }}</div>
        <q-linear-progress dark indeterminate color="green" class="q-mt-sm code-line" v-if="chapterLoading" />
      </q-card-section>
      
      <q-card-section class="terminal-text">
        <div class="console-text">
          <span class="animated-text">{{ formattedChapterText }}</span>
        </div>
      </q-card-section>
      
      <!-- Only show image after text animation completes -->
      <q-card-section 
        v-if="chapterData.image && imageVisible" 
        class="flex justify-center q-my-md image-section"
      >
        <img 
          :src="chapterData.image" 
          class="matrix-image"
          width="300px"
        />
      </q-card-section>
    </div>
    
    <!-- ENDING SCREEN: Show when there are no answers available -->
    <q-card-section 
      v-if="textAnimationComplete && (!chapterData.answers || chapterData.answers.length === 0)"
      class="ending-section q-py-xl"
    >
      <h1 class="ending-text">{{ lastLine }}</h1>
      <div class="q-mt-xl text-center">
        <q-btn 
          color="green" 
          outline
          size="lg"
          class="restart-btn"
          @click="restartAdventure"
        >
          RESTART ADVENTURE
        </q-btn>
      </div>
    </q-card-section>
    
    <!-- Only show options when answers exist -->
    <template v-else>
      <!-- Only show buttons after text animation and delay -->
      <q-card-section 
        class="q-pt-none q-mt-auto" 
        v-if="chapterData.answers && chapterData.answers.length && buttonsVisible"
      >
        <div class="text-h6 terminal-glow q-mb-md text-center">SELECT PATH:</div>
        <div class="row justify-center items-center no-wrap q-gutter-md">
          <q-btn 
            v-for="(answer, index) in chapterData.answers" 
            :key="index"
            outline 
            color="green" 
            class="matrix-btn"
            @click="chapterInpu = chapterData.chapters[index]"
          >
            <div class="terminal-btn-text">{{ index + 1 }}> <span class="animated-text">{{ answer }}</span></div>
          </q-btn>
        </div>
      </q-card-section>

      <q-card-section class="terminal-input-section">
        <div class="console-prompt">
          <span class="console-path">C:\COMMAND> </span>
          <input 
            ref="commandInput"
            v-model="terminalCommand" 
            class="terminal-input"
            type="text" 
            placeholder="Type your response..."
            @keydown.enter="executeCommand"
            :disabled="!buttonsVisible"
          />
        </div>
        <div v-if="commandError" class="terminal-error-message">
          COMMAND NOT RECOGNIZED
        </div>
      </q-card-section>
    </template>
  </q-card>
</template>

<style scoped>
/* Component-specific styles only */
.terminal-btn-text {
  opacity: 0;
  animation: fadeIn 0.5s forwards;
  animation-delay: var(--delay, 2s);
}

.ending-text {
  font-size: 2.5rem;
  color: #00ff00;
  text-align: center;
  font-family: 'Courier New', monospace;
  text-shadow: 0 0 10px #00ff00;
  animation: slowBlink 3s infinite;
  margin: 2rem 0;
}

.ending-section {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  min-height: 300px;
}

.restart-btn {
  font-family: 'Courier New', monospace;
  letter-spacing: 2px;
  margin-top: 40px;
  border: 2px solid #00ff00;
  box-shadow: 0 0 15px #00ff00;
  transition: all 0.3s;
}

.restart-btn:hover {
  background-color: rgba(0, 255, 0, 0.2);
  box-shadow: 0 0 25px #00ff00;
}
</style>